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
        'blog' => $request->session()->get('blog'),
        'header' => $request->session()->get('header'),
        'username' => $request->session()->get('username'),
    ]);
});

Route::get('/blog_list', [BlogController::class, 'getBlogs']);


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
        'blog' => $request->session()->get('blog'),
        ]);
});

Route::post('/create_post', [BlogController::class, 'createPost']);

Route::get('/remove_post/{id}', [BlogController::class, 'removePostById']);
Route::post('/remove_post/{id}', [BlogController::class, 'removePost']);

Route::get('/change_post/{id}', [BlogController::class, 'changePostById']);
Route::post('/change_post/{id}', [BlogController::class, 'changePost']);

Route::get('/logout', [UserController::class, 'logout']);


Route::get('/{blog}', [BlogController::class, 'showBlog']);
