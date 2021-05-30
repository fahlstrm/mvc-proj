<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Contracts\Auth\Authenticatable;
use Tests\TestCase;
use Tests\Feature\PDO;
use App\Models\User;
use App\Models\Blog;
use App\Http\Controllers\AuthenticationController;
use Illuminate\Support\Facades\DB;

class AuthTest extends TestCase
{
    public function testFindByUser()
    {
        $user = User::factory()->make();
        $this->withHeaders([
            'X-Header' => 'Value',
        ])->post('/create_blog', [
            'username' => $user->username,
            'header' => $user->header,
            'password' => $user->password,
            'blog' => $user->blog
            ]);

        $id = User::max('id');

        $controller = new AuthenticationController();
        $idFound = $controller->findByUser("Testaren");

        $this->assertDatabaseHas('user', [
            'id' => $id,
        ]);

        $this->assertIsObject($idFound);
    }


    public function testFindById()
    {
        $user = User::factory()->make();
        $this->withHeaders([
            'X-Header' => 'Value',
        ])->post('/create_blog', [
            'username' => $user->username,
            'header' => $user->header,
            'password' => $user->password,
            'blog' => $user->blog
            ]);

        $id = User::max('id');

        $controller = new AuthenticationController();
        $userFound = $controller->findById($id);

        $this->assertIsObject($userFound);
    }


    public function testFindHeader()
    {
        $user = User::factory()->make();
        $this->withHeaders([
            'X-Header' => 'Value',
        ])->post('/create_blog', [
            'username' => $user->username,
            'header' => $user->header,
            'password' => $user->password,
            'blog' => $user->blog
            ]);

        $controller = new AuthenticationController();
        $userFound = $controller->findHeader("Testaren");

        $this->assertIsObject($userFound);
    }

    public function testCheckUser()
    {
        $user = User::factory()->make();
        $this->withHeaders([
            'X-Header' => 'Value',
        ])->post('/create_blog', [
            'username' => $user->username,
            'header' => $user->header,
            'password' => $user->password,
            'blog' => $user->blog
            ]);

        $result = User::all();

        $controller = new AuthenticationController();
        $check = $controller->checkUser("password", $result);
        $this->assertIsObject($check);

        $check = $controller->checkUser("test", $result);
        $this->assertFalse($check);
    }
}
