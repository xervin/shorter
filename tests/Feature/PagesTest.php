<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PagesTest extends TestCase
{
    /**
     * @return void
     */
    public function test_index_page()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_login_page()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_register_page()
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    public function test_links_page_if_not_auth()
    {
        $response = $this->get('/links');

        $response->assertRedirect(
            route('login.form')
        );
    }

    public function test_dashboard_page_if_not_auth()
    {
        $response = $this->get('/dashboard');

        $response->assertRedirect(
            route('login.form')
        );
    }

    public function test_user_page_if_not_auth()
    {
        $response = $this->get('/user');

        $response->assertRedirect(
            route('login.form')
        );
    }

    public function test_links_page_if_auth()
    {
        $response = $this->registerUser()->get('/links');

        $response->assertStatus(200);
    }

    public function test_dashboard_page_if_auth()
    {
        $response = $this->registerUser()->get('/dashboard');

        $response->assertStatus(200);
    }

    public function test_user_page_if_auth()
    {
        $response = $this->registerUser()->get('/user');

        $response->assertStatus(200);
    }

    private function registerUser()
    {
        $user = User::factory()->create();

        return $this->actingAs($user)
            ->withSession(['banned' => false]);
    }
}
