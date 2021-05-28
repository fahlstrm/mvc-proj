<?php

namespace Tests\Feature;
use Illuminate\Foundation\Testing\RefreshDatabase;
// use Database\Seeders\OrderStatusSeeder;

use Illuminate\Contracts\Auth\Authenticatable;
use Tests\TestCase;
use Tests\Feature\PDO;

use App\Models\User;
use App\Models\Blog;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\DB;


class PostTest extends TestCase
{
    public function testFindByUser()
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
        
        $id = User::max('id');
        
        $controller = new PostController();
        $idFound = $controller->findByUser("Testaren");
        
        $this->assertDatabaseHas('user', [
            'id' => $id,
        ]);

        $this->assertIsObject($idFound);
    }


    public function testFindById()
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
        
        $id = User::max('id');

        $controller = new PostController();
        $userFound = $controller->findById($id);

        $this->assertIsObject($userFound);

    }

    public function testCheckUser()
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
        
        $result = User::all();

        $controller = new PostController();
        $check = $controller->checkUser("password", $result);
        $this->assertIsObject($check);

        $check = $controller->checkUser("test", $result);
        $this->assertFalse($check);


    }
}
