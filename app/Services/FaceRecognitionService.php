<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class FaceRecognitionService
{
    protected string $url;

    public function __construct()
    {
        $this->url = config('services.face_recognition.url', 'http://localhost:8000');
    }

    /**
     * Decode base64 image data into raw bytes.
     */
    protected function decodeBase64(string $base64Image): string
    {
        $rawBase64 = preg_replace('#^data:image/\w+;base64,#i', '', $base64Image);
        $rawBase64 = str_replace(' ', '+', $rawBase64);
        return base64_decode($rawBase64);
    }

    /**
     * Extracts a 512-dimension face embedding vector from a base64 image.
     *
     * @param string $base64Image
     * @return array
     * @throws \Exception
     */
    public function extractEmbedding(string $base64Image): array
    {
        $imageBytes = $this->decodeBase64($base64Image);
        $serviceUrl = rtrim($this->url, '/') . '/embeddings';

        try {
            Log::info("Requesting face embedding extraction from: {$serviceUrl}");
            
            $response = Http::attach(
                'file',
                $imageBytes,
                'face.jpg'
            )->post($serviceUrl);

            if ($response->successful()) {
                $data = $response->json();
                if (isset($data['embedding'])) {
                    return $data['embedding'];
                }
                throw new \Exception("Response did not contain an embedding array.");
            }

            $errorMsg = $response->json('detail') ?? $response->body() ?? 'Unknown error';
            Log::error("Face Service error during embedding extraction: Status {$response->status()} - {$errorMsg}");
            throw new \Exception("Face Service returned error: {$errorMsg}");

        } catch (\Exception $e) {
            Log::error("Failed to communicate with Face Service: " . $e->getMessage());
            throw $e;
        }
    }

    /**
     * Searches for a face match in the cloud using candidate employee signatures.
     *
     * @param string $base64Image The probe image
     * @param array $candidates Array of ['code' => '...', 'signatures' => [...]]
     * @return array|null Result array containing best_match_code, similarity, recognized
     */
    public function searchFace(string $base64Image, array $candidates): ?array
    {
        if (empty($candidates)) {
            Log::warning("No candidates provided for searchFace");
            return null;
        }

        $imageBytes = $this->decodeBase64($base64Image);
        $serviceUrl = rtrim($this->url, '/') . '/search';

        try {
            Log::info("Requesting face search from: {$serviceUrl} for " . count($candidates) . " candidates");

            $response = Http::attach(
                'file',
                $imageBytes,
                'probe.jpg'
            )->post($serviceUrl, [
                'candidates_json' => json_encode($candidates)
            ]);

            if ($response->successful()) {
                return $response->json();
            }

            $errorMsg = $response->json('detail') ?? $response->body() ?? 'Unknown error';
            Log::error("Face Service error during search: Status {$response->status()} - {$errorMsg}");
            return null;

        } catch (\Exception $e) {
            Log::error("Failed to search face via Face Service: " . $e->getMessage());
            return null;
        }
    }
}
