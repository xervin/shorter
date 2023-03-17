<?php

namespace App\Services;

use App\Services\Link\Enums\TokenGenerateMethod;

class TokenGenerator
{
    private const ALPHABET = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    private function __construct() {}
    private function __clone() {}

    /**
     * @param int $strength
     * @return string
     */
    public static function generate(int $strength = 7, TokenGenerateMethod $method = TokenGenerateMethod::simpleShuffle): string
    {
        return match ($method) {
            TokenGenerateMethod::simpleShuffle => self::simpleShuffle($strength),
            TokenGenerateMethod::simpleEnum => self::simpleEnum($strength)
        };
    }

    private static function simpleEnum(int $strength = 7): string
    {
        $length = strlen(self::ALPHABET);
        $randomToken = '';

        for($i = 0; $i < $strength; $i++) {
            $randomToken .= self::ALPHABET[mt_rand(0, $length - 1)];
        }

        return $randomToken;
    }

    private static function simpleShuffle(int $strength = 7): string
    {
        return substr(str_shuffle(self::ALPHABET), 0, $strength);
    }
}


