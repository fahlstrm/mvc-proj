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
    // public function testLogin()
    // {
    //     $response = $this->get('/login');

    //     // $response->assertStatus(200);
    // }

    public function testCreateUserToDatabase()
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

        
        $this->assertDatabaseHas('user', [
            'username' => $user->username,
        ]);

        $response->assertStatus(302);
        User::query()->where('username','=', 'testaren')->delete();
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
        User::query()->where('username','=', 'testaren')->delete();

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
        User::query()->where('username','=', 'testaren')->delete();

    }


    public function testLogout()
    {
        // $uri = 'public/logout';
        $response = $this->get('/logout');
        $response->assertStatus(302);
        // $response->assertRedirect($uri);
    }

    // public function testCreateUser()
    // {
    //     $response = $this->get('/create_blog');
    //     $response->assertStatus(200);
    // }


}
