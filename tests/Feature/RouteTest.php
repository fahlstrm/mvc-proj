<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
// use Database\Seeders\OrderStatusSeeder;

use Illuminate\Contracts\Auth\Authenticatable;
use Tests\TestCase;
use Tests\Feature\PDO;

use App\Models\User;
use App\Http\Controllers\UserController;



class RouteTest extends TestCase
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

    /**
     * Test that login-page is renderd
     */
    public function testLogin()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function testCreateUserToDatabase()
    {
        $user = User::factory()->make();

        var_dump($user);
    
        $response = $this->withHeaders([
            'X-Header' => 'Value',
        ])->post('/create_blog', [
            'username' => $user->username,
            'header' => $user->header,
            'password' => $user->password,
            'blog' => $user->blog
            ]);

        
        $this->assertDatabaseHas('user', [
            'username' => $user->username,
        ]);

        $response->assertStatus(302);
    }


    public function testLoginUser()
    {
        $user = User::factory()->make();

        $response = $this->withHeaders([
            'X-Header' => 'Value',
        ])->post('/create_blog', [
            'username' => $user->username,
            'header' => $user->header,
            'password' => $user->password,
            'blog' => $user->blog
            ]);

        $response = $this->withHeaders([
            'X-Header' => 'Value',
        ])->post('/login/{username}', [
            'username' => $user->username,
            'password' => $user->password,
            'blog' => $user->blog
            ]);

        $response->assertStatus(200);
    }

    public function testFailLogin()
    {
        $user = User::factory()->make();

        $response = $this->withHeaders([
            'X-Header' => 'Value',
        ])->post('/create_blog', [
            'username' => $user->username,
            'header' => $user->header,
            'password' => $user->password,
            'blog' => $user->blog
            ]);

        $response = $this->withHeaders([
            'X-Header' => 'Value',
        ])->post('/login/{username}', [
            'username' => $user->username,
            'password' => "hej",
            'blog' => $user->blog
            ]);

        $response = $this->get('/login/{username}');

        $response->assertStatus(405);
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
        $response = $this->get('/create_blog');
        $response->assertStatus(200);
    }

    public function testCreatePost()
    {
        $response = $this->get('/create_post');
        $response->assertStatus(200);
    }

    
    public function testRemovePost()
    {
        $response = $this->get('/remove_post');
        $response->assertStatus(200);
    }

    public function testBloglist()
    {
        $response = $this->get('/bloglist');
        $response->assertStatus(200);
    }

    public function testShowBlog()
    {
        $response = $this->get('/{blog}}');
        $response->assertStatus(200);
    }
}
