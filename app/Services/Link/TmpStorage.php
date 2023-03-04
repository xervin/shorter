<?php

namespace App\Services\Link;

use App\Models\Link;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;

class TmpStorage
{
    public static function save(?Link $link, int $expire = 86400): void
    {
        if ($link) {
            Cache::put($link->hash, $link->token, $expire);
            Cache::put($link->token, $link->link, $expire);
        }
    }

    public static function get(string $key)
    {
        return Cache::get($key);
    }
}
