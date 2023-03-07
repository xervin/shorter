<?php

namespace Tests\Feature;

use App\Models\Link;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LinkCreateTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create_link_if_not_auth()
    {
        $link = Link::factory()->create();

        $response = $this->json('POST', '/link/set', [
            'link' => $link->link
        ]);

        // todo дописать тест. должен проверять, чтобы в возвращаемой строке был токен
        $response->assertRedirectContains(route('pages.index') . '?link=');
    }

    private function registerUser()
    {
        $user = User::factory()->create();

        return $this->actingAs($user)
            ->withSession(['banned' => false]);
    }
}
