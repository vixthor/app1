<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\NewsDataService;

class NewsController extends Controller
{
    protected NewsDataService $news;

    public function __construct(NewsDataService $news)
    {
        $this->news = $news;
    }

    public function headlines(Request $request)
    {
        // Use request values for country/language/category/page if provided,
        // but enforce the app defaults: search query = 'oil' and page_size = 5.
        $params = $request->only(['country', 'language', 'category', 'page']);

        // set defaults from config
        $params['country'] = $params['country'] ?? config('news.default_country');
        $params['language'] = $params['language'] ?? config('news.default_language');

        // sanitize page input. NewsData uses token-based `page` pagination
        // (the API returns `nextPage` tokens). To support callers that pass a
        // numeric page index, we will follow `nextPage` tokens server-side.
        $requestedPage = 1;
        if (isset($params['page'])) {
            if (is_numeric($params['page'])) {
                $requestedPage = (int) $params['page'];
                if ($requestedPage < 1) {
                    $requestedPage = 1;
                }
                // remove numeric page from params so we can follow tokens
                unset($params['page']);
            } else {
                // non-numeric (likely a nextPage token) — pass through
                $params['page'] = $params['page'];
            }
        }

        // Force the search query to the app default (oil).
        $params['q'] = config('news.default_query');

        // First request (page 1 or token-based)
        $data = $this->news->headlines($params, 300);

        // If the client requested a numeric page > 1, follow nextPage tokens
        if ($requestedPage > 1 && is_array($data)) {
            $current = 1;
            while ($current < $requestedPage) {
                $nextToken = $data['nextPage'] ?? null;
                if (! $nextToken) {
                    break; // no more pages
                }
                // request next page using the token
                $params['page'] = $nextToken;
                $data = $this->news->headlines($params, 300);
                $current++;
                if (! is_array($data)) {
                    break;
                }
            }
        }

        // normalize response so frontend always receives a `results` array
        if (is_array($data) && isset($data['status']) && $data['status'] === 'error') {
            $message = $data['message'] ?? 'Unknown error';
            return response()->json(['status' => 'error', 'message' => $message, 'results' => []], $data['status_code'] ?? 500);
        }

        $items = [];
        if (is_array($data)) {
            if (isset($data['results']) && is_array($data['results'])) {
                $items = $data['results'];
            } elseif (isset($data['data']) && is_array($data['data'])) {
                $items = $data['data'];
            } elseif (isset($data['items']) && is_array($data['items'])) {
                $items = $data['items'];
            }
        }

        // Enforce application-level limit (slice to top N results)
        $limit = (int) config('news.default_page_size', 5);
        if (is_array($items) && $limit > 0) {
            $items = array_values(array_slice($items, 0, $limit));
        }

        // Include nextPage token for clients that want to continue pagination
        $response = ['status' => 'success', 'results' => $items];
        if (is_array($data) && isset($data['nextPage'])) {
            $response['nextPage'] = $data['nextPage'];
        }

        return response()->json($response);
    }

    public function search(Request $request)
    {
        $q = $request->get('q');
        if (! $q) {
            return response()->json(['status' => 'error', 'message' => 'Missing q parameter'], 422);
        }

        $params = $request->only(['country', 'language', 'page', 'page_size']);
        // same pagination handling as headlines: support numeric page indexes by
        // following nextPage tokens server-side. Translate page_size happens in service.
        $requestedPage = 1;
        if (isset($params['page'])) {
            if (is_numeric($params['page'])) {
                $requestedPage = (int) $params['page'];
                if ($requestedPage < 1) {
                    $requestedPage = 1;
                }
                unset($params['page']);
            } else {
                // token-like page value — pass through
                $params['page'] = $params['page'];
            }
        }

        $data = $this->news->search($q, $params, 300);

        if ($requestedPage > 1 && is_array($data)) {
            $current = 1;
            while ($current < $requestedPage) {
                $nextToken = $data['nextPage'] ?? null;
                if (! $nextToken) {
                    break;
                }
                $params['page'] = $nextToken;
                $data = $this->news->search($q, $params, 300);
                $current++;
                if (! is_array($data)) {
                    break;
                }
            }
        }

        if (is_array($data) && isset($data['status']) && $data['status'] === 'error') {
            $message = $data['message'] ?? 'Unknown error';
            return response()->json(['status' => 'error', 'message' => $message, 'results' => []], $data['status_code'] ?? 500);
        }

        $items = [];
        if (is_array($data)) {
            if (isset($data['results']) && is_array($data['results'])) {
                $items = $data['results'];
            } elseif (isset($data['data']) && is_array($data['data'])) {
                $items = $data['data'];
            } elseif (isset($data['items']) && is_array($data['items'])) {
                $items = $data['items'];
            }
        }

        return response()->json(['status' => 'success', 'results' => $items]);
    }
}
