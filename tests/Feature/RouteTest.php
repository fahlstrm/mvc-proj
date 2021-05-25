<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Database\Seeders\OrderStatusSeeder;

use Illuminate\Contracts\Auth\Authenticatable;
use Tests\TestCase;

use App\Models\User;
use App\Http\Controllers\UserController;



class RouteTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    // public function testExample()
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }

    // /**
    //  * Test that login-page is renderd
    //  */
    // public function testLogin()
    // {
    //     $response = $this->get('/login');

    //     $response->assertStatus(200);
    // }

    public function testCreateUserToDatabase()
    {
        $user = User::factory()->make();
        
        $this->assertDatabaseHas('user', [
            'username' => $user->username,
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

    // public function testLoginUser()
    // {
    //     $response = $this->withHeaders([
    //         'X-Header' => 'Value',
    //     ])->post('/login/user', ['name' => 'blogg']);

    //     $response->assertStatus(200);
    // }




    // public function testLogout()
    // {
    //     // $uri = 'public/logout';
    //     $response = $this->get('/logout');
    //     $response->assertStatus(302);
    //     // $response->assertRedirect($uri);
    // }

    // public function testCreateUser()
    // {
    //     $response = $this->get('/create_blog');
    //     $response->assertStatus(200);
    // }

    // public function testCreatePost()
    // {
    //     $response = $this->get('/create_post');
    //     $response->assertStatus(200);
    // }

    
    // public function testRemovePost()
    // {
    //     $response = $this->get('/remove_post');
    //     $response->assertStatus(200);
    // }

    // public function testBloglist()
    // {
    //     $response = $this->get('/bloglist');
    //     $response->assertStatus(200);
    // }

    // public function testShowBlog()
    // {
    //     $response = $this->get('/{blog}}');
    //     $response->assertStatus(200);
    // }
}
