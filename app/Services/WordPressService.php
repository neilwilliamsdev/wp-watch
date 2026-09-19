<?php

namespace App\Services;

use App\Models\Site;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Http;

class WordPressService
{
    public function getPluginUpdates(Site $site): array
    {
        $credentials = config(
            'services.wp_watch.' . $site->credential_key
        );

        $response = Http::withBasicAuth(
            $credentials['username'],
            $credentials['password']
        )->get($site->url . '/wp-json/wp-watch/v1/plugin-updates');

        return $response->json();
    }

    public function isAvailable(Site $site): bool
    {
        try {
            return Http::timeout(10)
                ->get($site->url . '/wp-json/')
                ->successful();
        } catch (ConnectionException $e) {
            return false;
        }
    }
}