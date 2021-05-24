<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class AuthenticationController extends Controller
{
    public function findByUser($user)
    {
        $id = User::query()->where('user', $user)->get();

        return $id;
    }

    public function findById($id)
    {
        $user = User::query()->where('user_id', $id)->get();

        return $user;
    }

    public function findByBlog($blog)
    {
        // $user = User::where('blog', $blog)
        //     ->get();
        $user = User::query()->findOrFail($blog);

        return $user;
    }

    public function findHeader($username)
    {
        $result = User::query()->where('username', $username)->get();

        return $result;
    }

    public function checkPassword($password, $user)
    {
        $result = User::query()->where('password', $password)->get();
        $auth = $this->checkUser($password, $result);

        return $auth;
    }

    public function checkUser($password, $result)
    {
        foreach ($result as $user) {
            if ($user->password == $password) {
                return $user;
            }
        }

        return false;
    }
}
