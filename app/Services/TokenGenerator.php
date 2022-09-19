<?php

namespace App\Services;

class TokenGenerator
{
//    private const PERMITTED_CHARS = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    private const PERMITTED_CHARS = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    private function __construct() {}
    private function __clone() {}

    /**
     * @param int $strength
     * @return string
     */
    public static function generate(int $strength = 7): string
    {
        $length = strlen(self::PERMITTED_CHARS);
        $randomToken = '';

        for($i = 0; $i < $strength; $i++) {
            $randomCharacter = self::PERMITTED_CHARS[mt_rand(0, $length - 1)];
            $randomToken .= $randomCharacter;
        }

        return $randomToken;
    }
}
