<?php

namespace App\Services\Link;

use App\Models\Link;
use Illuminate\Support\Facades\Redis;

class TmpStorage
{
    public static function save(?Link $link, int $expire = 86400): void
    {
        if ($link) {
            Redis::set($link->hash, $link->token, 'EX', $expire);
            Redis::set($link->token, $link->link, 'EX', $expire);
        }
    }

    public static function get(string $key)
    {
        return Redis::get($key);
    }
}
