<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\AuthenticationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Blog;
use App\Models\User;
use  Illuminate\Support\Facades\Schema;

class BlogController extends Controller
{
    public function createPost(Request $request)
    {
        $blog = new Blog();

        $blog->blog =  $request->session()->get('blog');
        $blog->title = $request->input('title');
        $blog->post = $request->input('post');

        $blog->save();

        $posts = Blog::query()->where('blog', $blog->blog)
            ->orderBy('created_at', 'desc')
            ->get();

        return redirect('/'.$blog->blog)->with([
            'title' => $request->session()->get('blog'),
            'username' => $request->session()->get('username'),
            'header' =>  $request->session()->get('header'),
            'posts' => ($posts->isEmpty()) ? null : $posts,
            'blog' => $request->session()->get('blog'),
        ]);
    }

    public function getPostById($id, Request $request)
    {
        $post = Blog::query()->find($id);

        return view('remove_post', [
            'title' => "Ta bort inlägg",
            'username' => $request->session()->get('username'),
            'header' =>  $request->session()->get('header'),
            'post' => $post
        ]);
    }

    public function removePost($id)
    {
        $blog = Blog::query()->find($id);
        Blog::query()->find($id)->delete();

        return redirect('/' . $blog['blog']);
    }

    public function getBlogs(Request $request)
    {

        return view('blog_list', [
            'title' => "mvc -blogglista",
            'username' => $request->session()->get('username'),
            'header' =>  $request->session()->get('header'),
            'posts' => $this->countPosts(),
            'latest' => $this->latestPosts(),
            'created' => $this->latestCreated()
        ]);
    }

    public function latestCreated()
    {
        $latest = User::query()->orderBy('id', 'desc')
        ->take(10)
        ->get();

        return $latest;
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

        $joined = User::query()->leftJoin('blog', 'blog.blog', '=', 'user.blog')
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
        $latest = Blog::query()->orderBy('created_at', 'desc')
            ->take(10)
            ->get();

        return $latest;
    }

    public function showBlog($blog, Request $request)
    {
        $posts = Blog::query()->where('blog', $blog)->orderBy('created_at', 'desc')->get();

        return view('show_blog', [
            'title' => $request->session()->get('blog'),
            'username' => $request->session()->get('username'),
            'header' =>  $request->session()->get('header'),
            'posts' => ($posts->isEmpty()) ? null : $posts
        ]);
    }
}
