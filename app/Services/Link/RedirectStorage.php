<?php

namespace App\Services\Link;

use Illuminate\Support\Facades\Redis;

class RedirectStorage
{
    private const REDIRECT_PREFIX = 'redirect_token';

    public static function add(string $token): void
    {
        Redis::hincrby(self::REDIRECT_PREFIX, $token, 1);
    }

    public static function list(): array
    {
        return Redis::hgetall(self::REDIRECT_PREFIX);
    }

    public static function clear(): void
    {
        Redis::del(self::REDIRECT_PREFIX);
    }
}
