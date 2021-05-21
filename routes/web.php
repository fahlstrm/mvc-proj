<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlogPortalController;
use App\Http\Controllers\BlogController;
use Illuminate\Http\Request;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function (Request $request) {
    return view('index', [
        'title' => $request->session()->get('blog'),
        'header' => $request->session()->get('header'),
        'username' => $request->session()->get('username'),
    ]);
});

Route::get('/login', function () {
    return view('login', [
        'title' => 'mvc - logga in',
        'message' => null,
        'username' => null
    ]);
});


Route::post('/login/{username}', [UserController::class, 'login']);

Route::get('/create_blog', function () {
    return view('create_blog', [
        'title' => 'mvc - skapa blogg',
        'username' => null
    ]);
});

Route::post('/create_blog', [UserController::class, 'createUser']);


Route::get('/create_post', function (Request $request) {
    return view('create_post', [
        'title' => "mvc - skapa inlägg",
        'header' => $request->session()->get('header'),
        'username' => $request->session()->get('username'),
        ]);
});

Route::post('/create_post', [BlogController::class, 'createPost']);

Route::get('/remove_post/{id}', [BlogController::class, 'getPostById']);

Route::post('/remove_post/{id}', [BlogController::class, 'removePost']);


Route::get('/logout', [UserController::class, 'logout']);


Route::get('/new', function () {
    return view('new_post', ['title' => 'mvc - nytt inlägg' ]);
});

Route::get('/bloglist', [BlogController::class, 'getBlogs']);


Route::get('/{blog}', [BlogController::class, 'showBlog']);


