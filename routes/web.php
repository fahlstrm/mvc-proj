<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlogPortalController;


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

Route::get('/', function ($user = null) {
    return view('index', [
        'title' => 'mvc - bloggportal',
        'user' => $user
    ]);
});

Route::get('/login', function () {
    return view('login', [
        'title' => 'mvc - logga in',
        'user' => null
    ]);
});


Route::post('/login/{user}', [BlogPortalController::class, 'login']);

Route::get('/create_blog', function () {
    return view('create_blog', [
        'title' => 'mvc - skapa blogg',
        'user' => null
    ]);
});

Route::post('/create_blog', [BlogPortalController::class, 'createUser']);


Route::get('/create_post', function () {
    return view('create_post', [
        'title' => "mvc - skapa inlägg", 
        ]);
});


Route::get('/logout', [BlogPortalController::class, 'logout']);


Route::get('/new', function () {
    return view('new_post', ['title' => 'mvc - nytt inlägg' ]);
});

Route::get('/{blog_name}}', function () {
    return view('show_blog', [
        'title' => $blog_name, 
        ]);
});
