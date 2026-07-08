<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\SubscriptionVerificationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SubscriptionController extends Controller
{
    protected SubscriptionVerificationService $verificationService;

    public function __construct(SubscriptionVerificationService $verificationService)
    {
        $this->verificationService = $verificationService;
    }

    /**
     * Verify a subscription purchase token / receipt.
     */
    public function verify(Request $request)
    {
        $request->validate([
            'platform' => 'required|string|in:ios,android',
            'product_id' => 'required|string',
            'verification_token' => 'required|string',
        ]);

        $user = $request->user();
        $platform = $request->input('platform');
        $productId = $request->input('product_id');
        $token = $request->input('verification_token');

        try {
            // Verify token / receipt with Apple / Google Play
            $result = $this->verificationService->verify($platform, $productId, $token);

            if (!$result['status']) {
                return response()->json([
                    'status' => 'error',
                    'message' => $result['message'] ?? 'Subscription verification failed.'
                ], 422);
            }

            // Update user model with subscription status and limits
            $user->update([
                'subscription_platform' => $platform,
                'subscription_tier' => $result['tier'],
                'subscription_active' => true,
                'subscription_expires_at' => $result['expires_at'],
                'max_employees' => $result['max_employees'],
                'purchase_token' => $token,
                'original_transaction_id' => $result['original_transaction_id'],
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Subscription verified successfully.',
                'user' => [
                    'subscription_tier' => $user->subscription_tier,
                    'subscription_active' => (bool)$user->subscription_active,
                    'subscription_expires_at' => $user->subscription_expires_at ? $user->subscription_expires_at->toDateTimeString() : null,
                    'max_employees' => $user->max_employees,
                ]
            ]);

        } catch (\Exception $e) {
            Log::error("Subscription verification endpoint error: " . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred during verification: ' . $e->getMessage()
            ], 500);
        }
    }
}
