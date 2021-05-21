<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\AuthenticationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Blog;
use App\Models\User;

class BlogController extends Controller
{
    private object $user;

    public function construct__()
    {
        $this->user = new AuthenticationController();
    }

    public function createPost(Request $request)
    {
        $blog = new Blog();

        $blog->blog =  $request->session()->get('blog');
        $blog->title = $request->input('title');
        $blog->post = $request->input('post');

        $blog->save();

        $posts = Blog::where('blog', $blog->blog)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('show_blog', [
            'title' => $request->session()->get('blog'),
            'username' => $request->session()->get('username'),
            'header' =>  $request->session()->get('header'),
            'posts' => ($posts->isEmpty()) ? null : $posts

        ]);
    }

    public function getPostById($id, Request $request)
    {
        $post = Blog::find($id);
        
        return view('remove_post', [
            'title' => "Ta bort inlägg",
            'username' => $request->session()->get('username'),
            'header' =>  $request->session()->get('header'),
            'post' => $post
        ]);
    }

    public function removePost($id, Request $request)
    {
        $blog = Blog::find($id);
        $post = Blog::find($id)->delete();
        
        return redirect('/'. $blog->blog);
    }

    public function getBlogs(Request $request)
    {
        $blogs = User::all();
        
        return view('blog_list', [
            'title' => "mvc -blogglista",
            'username' => $request->session()->get('username'),
            'header' =>  $request->session()->get('header'),
            'posts' => $this->countPosts(),
            'latest' => $this->latestPosts()
        ]);
    }


    public function countPosts()
    {
        // $joined = User::leftJoin('blog', function($join_blog){ 
        //    $join_blog-> on 
        //        ('blog.blog', '=','user.blog');}
        // )->groupBy('blog.blog')->count();

        // $joined = DB::table('user as u')
        //     ->leftJoin('blog as b', 'u.blog', '=', 'b.blog')
        //     ->count();

        // $joined = DB::table('user')
        // ->leftJoin('blog', function($join)
        // {
        //     $join->on('user.blog', '=', 'blog.blog')
        //         ->groupBy('blog.blog');
        // })
        // ->get();

        // $joined = DB::table('user')
        //     ->join('blog', 'blog.blog', '=', 'user.blog')
        //     ->select(
        //         'user.*',
        //     DB::raw("count(blog.blog) AS posts"))
        //     ->groupBy('blog.blog')
        //     ->get();

        $joined = User::leftJoin('blog', 'blog.blog', '=', 'user.blog')
            ->select([
                'user.*',
                DB::raw('COUNT(blog.blog) AS posts')
            ])
            ->groupBy('blog.blog')
            ->orderBy('posts', 'desc')
            ->get();

        return $joined;
    }

    public function latestPosts()
    {
        $latest = Blog::orderBy('created_at', 'desc')
            ->take(10)
            ->get();

        return $latest;
    }

    public function showBlog($blog, Request $request)
    {
        $posts = Blog::where('blog', $blog)->orderBy('created_at', 'desc')->get();

        return view('show_blog', [
            'title' => $request->session()->get('blog'),
            'username' => $request->session()->get('username'),
            'header' =>  $request->session()->get('header'),
            'posts' => ($posts->isEmpty()) ? null : $posts
        ]);
    }

    

}