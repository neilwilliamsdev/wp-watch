<?php

namespace App\Services;

use App\Models\Site;
use Illuminate\Support\Facades\Http;

class WordPressService
{
    public function getPluginUpdates(Site $site): array
    {
        $response = Http::withBasicAuth(
            env('ES_WATCH_USERNAME'),
            env('ES_WATCH_PASSWORD')
        )->get($site->url . '/wp-json/wp-watch/v1/plugin-updates');

        return $response->json();
    }
}