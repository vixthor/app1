<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class NewsDataService
{
    protected string $baseUrl;
    protected ?string $apiKey;

    public function __construct()
    {
        $this->baseUrl = config('news.base_url');
        $this->apiKey = config('news.api_key');
    }

    protected function get(string $endpoint, array $query = [], int $cacheSeconds = 0)
    {
        // normalize and clean query params
        $query = array_filter($query, function ($v) {
            return $v !== null && $v !== '';
        });

        // Translate page_size -> size (newsdata uses `size`)
        if (isset($query['page_size'])) {
            $size = (int) $query['page_size'];
            unset($query['page_size']);
            if ($size > 0) {
                // cap to provider max
                $query['size'] = min(50, $size);
            }
        }

        // If size provided make sure it's within reasonable bounds
        if (isset($query['size'])) {
            $query['size'] = min(50, max(1, (int) $query['size']));
        }

        if ($this->apiKey) {
            $query['apikey'] = $this->apiKey;
        }

        $cacheKey = 'newsdata:' . md5($endpoint . ':' . http_build_query($query));

        if ($cacheSeconds > 0) {
            return Cache::remember($cacheKey, $cacheSeconds, function () use ($endpoint, $query) {
                return $this->request($endpoint, $query);
            });
        }

        return $this->request($endpoint, $query);
    }

    protected function request(string $endpoint, array $query)
    {
        $url = rtrim($this->baseUrl, '/') . '/' . ltrim($endpoint, '/');

        try {
            $response = Http::acceptJson()->timeout(10)->get($url, $query);

            if ($response->successful()) {
                return $response->json();
            }

            if ($response->status() == 429) {
                return [
                    'status' => 'error',
                    'message' => 'Rate limit exceeded',
                    'status_code' => 429,
                ];
            }

            return [
                'status' => 'error',
                'message' => $response->body(),
                'status_code' => $response->status(),
            ];
        } catch (\Exception $e) {
            Log::error('NewsDataService request failed: ' . $e->getMessage());

            return [
                'status' => 'error',
                'message' => $e->getMessage(),
                'status_code' => 500,
            ];
        }
    }

    public function headlines(array $params = [], int $cacheSeconds = 300)
    {
        $defaults = [
            'country' => config('news.default_country'),
            'language' => config('news.default_language'),
        ];

        $query = array_merge($defaults, $params);

        // Do not force a numeric page here — controller will decide whether to
        // request a specific page token or handle numeric pagination server-side.
        if (isset($query['page']) && $query['page'] === null) {
            unset($query['page']);
        }

        return $this->get('news', $query, $cacheSeconds);
    }

    public function search(string $q, array $params = [], int $cacheSeconds = 300)
    {
        $query = array_merge($params, ['q' => $q]);

        if (isset($params['page'])) {
            $query['page'] = $params['page'];
        }

        return $this->get('news', $query, $cacheSeconds);
    }

    public function sources(array $params = [], int $cacheSeconds = 86400)
    {
        return $this->get('sources', $params, $cacheSeconds);
    }
}
