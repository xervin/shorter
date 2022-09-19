<?php

namespace App\Services\Link;

use App\Models\Link;
use Illuminate\Support\Facades\Redis;

class RedisStorage
{
    public static function save(?Link $link, int $expire = 86400): void
    {
        if ($link) {
            Redis::set($link->hash, $link->token, 'EX', $expire);
            Redis::set($link->token, $link->link, 'EX', $expire);
        }
    }
}
