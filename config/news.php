<?php

return [
    'base_url' => env('NEWSDATA_BASE_URL', 'https://newsdata.io/api/1/'),
    'api_key' => env('NEWSDATA_API_KEY'),
    'default_country' => env('NEWSDATA_DEFAULT_COUNTRY', 'us'),
    'default_language' => env('NEWSDATA_DEFAULT_LANGUAGE', 'en'),
    // default search query and page size used by the app (filter for "oil")
    'default_query' => env('NEWSDATA_DEFAULT_QUERY', 'oil'),
    'default_page_size' => (int) env('NEWSDATA_DEFAULT_PAGE_SIZE', 5),
];
