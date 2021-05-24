<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testLogin()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function testLogout()
    {
        // $uri = 'public/logout';
        $response = $this->get('/logout');
        $response->assertStatus(302);
        // $response->assertRedirect($uri);
    }

    public function testCreateUser()
    {
        // $uri = 'public/logout';
        $response = $this->get('/create_blog');
        $response->assertStatus(200);
        // $response->assertRedirect($uri);
    }

    public function testCreatePost()
    {
        // $uri = 'public/logout';
        $response = $this->get('/create_post');
        $response->assertStatus(200);
        // $response->assertRedirect($uri);
    }
}
