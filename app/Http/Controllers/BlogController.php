<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class BlogController extends Controller
{
    public function getAllBlogs() 
    {
        $blogs = Blog::all();

        return $id;
    }

}