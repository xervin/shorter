<?php

namespace App\Helpers;

class Url
{
    public static function unParse(array $parsedUrl): string
    {
        $scheme = $parsedUrl['scheme'] ?? null;
        $host = $parsedUrl['host'] ?? null;
        $port = $parsedUrl['port'] ?? null;

        $user = $parsedUrl['user'] ?? null;
        $pass = $parsedUrl['pass'] ?? null;

        $path = $parsedUrl['path'] ?? null;
        $query = $parsedUrl['query'] ?? null;

        $fragment = $parsedUrl['fragment'] ?? null;

        return ($scheme ? $scheme . '://' : null)
            . $host
            . $port
            . $user
            . (($user || $pass) ? "$pass@" : null)
            . $path . ($query ? "?$query" : null)
            . ($fragment ? "#$fragment" : null);
    }

    public static function trimSlashes(string $url): string
    {
        $parsedUrl = parse_url($url);

        if (isset($parsedUrl['path'])) {
            $parsedUrl['path'] = rtrim($parsedUrl['path'], '/');
        }

        if (isset($parsedUrl['query'])) {
            $parsedUrl['query'] = rtrim($parsedUrl['query'], '/');
        }

        if (isset($parsedUrl['fragment'])) {
            $parsedUrl['fragment'] = rtrim($parsedUrl['fragment'], '/');
        }

        return self::unParse($parsedUrl);
    }
}
