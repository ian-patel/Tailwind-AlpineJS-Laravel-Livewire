<?php

namespace App\Clients;

use App\Source;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;

class MagicSource
{
    /**
     * List of apis.
     *
     * @var array
     */
    protected static $api = [
        'fetch' => 'v1/feed',
        'search' => 'v1/search',
    ];

    /**
     * Default Sort.
     *
     * @var string
     */
    protected static $defaultSort = 'created';

    /**
     * Pull new posts.
     *
     * @param  int $limit
     * @param  string $source
     * @return bool|Illuminate\Support\Collection
     */
    public static function fetch(int $limit = 1000, string $source = null)
    {
        $url = config('services.magic_source.base_url') . self::$api['fetch'] . '/' . $source;

        $response = Http::get(
            $url,
            Arr::collapse([
                Source::fetchableList(),
                [
                    'limit' => $limit,
                    'sort' => self::$defaultSort,
                ],
            ])
        );

        if ($response->ok()) {
            return collect($response->json());
        }

        return false;
    }
}
