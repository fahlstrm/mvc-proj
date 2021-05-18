<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\AuthenticationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class BlogPortalController extends Controller
{
    public object $auth;

    public function __construct() 
    {
        $this->auth = new AuthenticationController;
    }
    /**
     * Show the profile for a given user.
     *
     * @param  int  $user
     * @return \Illuminate\View\View
     */
    public function login(Request $request)
    {
        $auth = $this->auth->checkPassword($request->password, strtolower($request->user));
        if ($auth) {
            $user = $request->user;
            $title = $request->user;
            $request->session()->put('user', $user);

            return view('index', [
                'title' => $title,
                'user' => $user
            ]);
        } else {
            $user = null;
            return view('login', [
                'title' => "Inloggning misslyckades",
                'user' => $user
            ]);
        }
    }

    public function logout(Request $request)
    {
        $request->session()->put('user', null);

        return redirect('/')->with([
            'title' => "Utloggad",
            'user' => $request->session()->get('user'),
        ]);
    }

    /**
     * Creates a new user
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function createUser(Request $request)
    {
        $user = new User;
        $user->user = strtolower($request->input('user'));
        $user->blog = $request->input('blog');
        $user->password = $request->input('password');

        $user->save();

        $request->session()->put('user', $user->user);

        return view('/', [
            'user' => $request->session()->get('user'),
        ]);
    }


}