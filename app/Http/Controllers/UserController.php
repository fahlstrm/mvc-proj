<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\BlogController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserController extends Controller
{
    public object $auth;

    public function __construct()
    {
        $this->auth = new AuthenticationController();
    }

    public function login(Request $request)
    {
        $auth = $this->auth->checkPassword($request->input('password'), strtolower($request->input('user')));
        if ($auth) {
            $request->session()->put('username', $request->input('username'));
            $request->session()->put('header', $auth->header);
            $request->session()->put('blog', $auth->blog);
            return view('index', [
                'title' => "mvc - inloggad som {$request->input('username')}",
                'header' => $auth->header,
                'username' => $request->input('username')
            ]);
        } else {
            return view('login', [
                'title' => "mvc - logga in",
                'message' => "Inloggning misslyckades",
                'username' => null
            ]);
        }
    }

    public function logout(Request $request)
    {
        $request->session()->put('username', null);
        $request->session()->put('header', null);
        $request->session()->put('blog', "mvc - bloggportalen");

        return redirect('/')->with([
            'title' => "mvc - bloggportalen",
            'username' => $request->session()->get('username'),
        ]);
    }

    /**
     * Creates a new user
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function createUser(Request $request)
    {
        $user = new User();
        $user->username = strtolower($request->input('username'));
        $user->header = $request->input('header');
        $user->blog = $request->input('blog');
        $user->password = $request->input('password');

        $user->save();

        $request->session()->put('username', $user->username);
        $request->session()->put('header', $user->header);
        $request->session()->put('blog', $auth->blog);

        return redirect('/')->with([
            'title' => $user->blog,
            'username' => $request->session()->get('username'),
            'header' =>  $request->session()->get('header'),
        ]);
    }
}
