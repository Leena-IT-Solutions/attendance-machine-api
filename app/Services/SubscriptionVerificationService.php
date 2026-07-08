<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SubscriptionVerificationService
{
    /**
     * Verify the subscription receipt / token with Apple or Google Play.
     *
     * @param string $platform 'ios' or 'android'
     * @param string $productId The product ID purchased
     * @param string $token The iOS receipt or Android purchaseToken
     * @return array Array with [status => bool, expires_at => Carbon, original_transaction_id => string, tier => string, max_employees => int]
     */
    public function verify(string $platform, string $productId, string $token): array
    {
        if ($platform === 'ios') {
            return $this->verifyIos($productId, $token);
        } elseif ($platform === 'android') {
            return $this->verifyAndroid($productId, $token);
        }

        throw new \Exception("Unsupported platform: {$platform}");
    }

    /**
     * Map Product ID to Employee Limit and Tier name.
     */
    public function mapProductToLimits(string $productId): array
    {
        $productIdLower = strtolower($productId);

        // Standardized mapping:
        // E.g., 'monthly_5_emp', 'yearly_5', 'in.leenaitsolutions.attendance.monthly_5'
        $limit = 2; // Default free limit
        $tier = 'free';

        if (str_contains($productIdLower, 'unlimited')) {
            $limit = 999999;
            $tier = 'tier_unlimited';
        } elseif (preg_match('/(?:_|\.)(\d+)(?:_emp)?$/', $productIdLower, $matches)) {
            $limit = (int)$matches[1];
            $tier = 'tier_' . $limit;
        } elseif (preg_match('/(?:_|\.)(\d+)(?:_)/', $productIdLower, $matches)) {
            $limit = (int)$matches[1];
            $tier = 'tier_' . $limit;
        }

        return [
            'tier' => $tier,
            'max_employees' => $limit,
        ];
    }

    /**
     * Verify iOS receipt with Apple.
     */
    protected function verifyIos(string $productId, string $receiptData): array
    {
        $prodUrl = 'https://buy.itunes.apple.com/verifyReceipt';
        $sandboxUrl = 'https://sandbox.itunes.apple.com/verifyReceipt';

        Log::info("Apple receipt verification request for product: {$productId}");

        $sharedSecret = env('APPLE_SHARED_SECRET');
        $payload = [
            'receipt-data' => $receiptData,
            'exclude-old-transactions' => true,
        ];
        if ($sharedSecret) {
            $payload['password'] = $sharedSecret;
        }

        // Attempt verification on production first
        $response = Http::post($prodUrl, $payload);

        if ($response->failed()) {
            throw new \Exception("Failed to connect to Apple production server.");
        }

        $data = $response->json();
        $status = $data['status'] ?? -1;

        // Status 21007: Sandbox receipt sent to production, retry with sandbox
        if ($status === 21007) {
            Log::info("Sandbox receipt detected. Retrying with sandbox server.");
            $response = Http::post($sandboxUrl, $payload);

            if ($response->failed()) {
                throw new \Exception("Failed to connect to Apple sandbox server.");
            }

            $data = $response->json();
            $status = $data['status'] ?? -1;
        }

        if ($status !== 0) {
            Log::error("Apple verification failed with status: {$status}");
            return ['status' => false, 'message' => "Apple receipt validation failed. Status code: {$status}"];
        }

        // Parse latest receipt info to find active subscription
        $latestReceiptInfo = $data['latest_receipt_info'] ?? $data['receipt']['in_app'] ?? [];
        if (empty($latestReceiptInfo)) {
            return ['status' => false, 'message' => 'No transaction records found in receipt.'];
        }

        // Sort transactions by expires_date_ms descending to check the latest
        usort($latestReceiptInfo, function ($a, $b) {
            return ($b['expires_date_ms'] ?? 0) <=> ($a['expires_date_ms'] ?? 0);
        });

        $latestTx = $latestReceiptInfo[0];
        $txProductId = $latestTx['product_id'] ?? $productId;
        $expiresDateMs = $latestTx['expires_date_ms'] ?? null;
        $originalTxId = $latestTx['original_transaction_id'] ?? ($latestTx['transaction_id'] ?? null);

        if (!$expiresDateMs) {
            // Might be a non-consumable one-time purchase
            $expiresAt = now()->addYears(100);
            $isActive = true;
        } else {
            $expiresAt = \Carbon\Carbon::createFromTimestampMs($expiresDateMs);
            $isActive = $expiresAt->isFuture();
        }

        $limits = $this->mapProductToLimits($txProductId);

        return [
            'status' => $isActive,
            'expires_at' => $expiresAt,
            'original_transaction_id' => $originalTxId,
            'tier' => $limits['tier'],
            'max_employees' => $limits['max_employees'],
        ];
    }

    /**
     * Verify Android Purchase Token with Google Play.
     */
    protected function verifyAndroid(string $productId, string $purchaseToken): array
    {
        Log::info("Google Play token verification request for product: {$productId}");

        $credentialsPath = storage_path('app/google-credentials.json');

        if (!file_exists($credentialsPath)) {
            Log::warning("Google Play credentials file not found at: {$credentialsPath}. Running in Mock/Testing mode.");
            
            // local development bypass: auto-approve
            if (app()->environment('local', 'testing')) {
                $limits = $this->mapProductToLimits($productId);
                return [
                    'status' => true,
                    'expires_at' => now()->addMonth(),
                    'original_transaction_id' => 'mock_android_tx_' . time(),
                    'tier' => $limits['tier'],
                    'max_employees' => $limits['max_employees'],
                ];
            }

            throw new \Exception("Google service account credentials file is missing in production.");
        }

        try {
            // Load credentials and create Google Client
            $client = new \Google\Client();
            $client->setAuthConfig($credentialsPath);
            $client->addScope(\Google\Service\AndroidPublisher::ANDROIDPUBLISHER);

            $service = new \Google\Service\AndroidPublisher($client);
            $packageName = config('app.android_package_name', 'in.leenaitsolutions.attendance.machine');

            // For subscriptions, use purchases_subscriptions->get
            // For one-time products, you would use purchases_products->get
            $purchase = $service->purchases_subscriptions->get($packageName, $productId, $purchaseToken);

            $expiryTimeMillis = $purchase->getExpiryTimeMillis();
            $expiresAt = \Carbon\Carbon::createFromTimestampMs($expiryTimeMillis);
            $isActive = $expiresAt->isFuture();
            
            // Check cancelState (if canceled by user, it remains active until expiry)
            $originalTxId = $purchase->getOrderId();
            $limits = $this->mapProductToLimits($productId);

            return [
                'status' => $isActive,
                'expires_at' => $expiresAt,
                'original_transaction_id' => $originalTxId,
                'tier' => $limits['tier'],
                'max_employees' => $limits['max_employees'],
            ];

        } catch (\Exception $e) {
            Log::error("Google Play verification error: " . $e->getMessage());
            
            // Fallback for local testing if API calls fail due to package configuration
            if (app()->environment('local', 'testing')) {
                Log::info("Fallback to mock response during local environment failure.");
                $limits = $this->mapProductToLimits($productId);
                return [
                    'status' => true,
                    'expires_at' => now()->addMonth(),
                    'original_transaction_id' => 'mock_android_fallback_' . time(),
                    'tier' => $limits['tier'],
                    'max_employees' => $limits['max_employees'],
                ];
            }

            throw $e;
        }
    }
}
