<?php

namespace Database\Factories;

use App\Services\Link\Structures\Link;
use App\Services\TokenGenerator;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Link>
 */
class LinkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $link = new Link(
            TokenGenerator::generate(),
            fake()->url,
            fake()->ipv4(),
            fake()->text(rand(5, 15))
        );

        return [
            'token' => $link->getToken(),
            'hash' => $link->getHash(),
            'link' => $link->getLink(),
            'ip' => $link->getIp()
        ];
    }
}
