<?php

namespace Tests\Feature;
use Illuminate\Foundation\Testing\RefreshDatabase;
// use Database\Seeders\OrderStatusSeeder;

use Illuminate\Contracts\Auth\Authenticatable;
use Tests\TestCase;
use Tests\Feature\PDO;

use App\Models\User;
use App\Models\Blog;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\DB;


class BlogTest extends TestCase
{


    public function testCreatePost()
    {
        $response = $this->get('/create_post');
        $response->assertStatus(200);
    }


    public function testBloglist()
    {
        $response = $this->get('/blog_list');
        $response->assertStatus(200);
    }

    public function testShowBlog()
    {
        $response = $this->get('/{blog}}');
        $response->assertStatus(200);
    }

    public function testRemovePost()
    {
        $response = $this->get('/remove_post');
        $response->assertStatus(200);
    }

        
    public function testGetRemovePost()
    {
        $blog = Blog::factory()->make();
        $blog->save();

        $id = Blog::max('id');

        $response = $this->withHeaders([
            'X-Header' => 'Value',
        ])->get('/remove_post/{id}', [
            'id' => $id,
            ]);

        $response->assertStatus(500);
    }

    public function testCreateRemove()
    {
        $blog = Blog::factory()->make();

        $response = $this->withHeaders([
            'X-Header' => 'Value',
        ])->post('/create_post', [
            'blog' => "Testbloggen",
            'title' => $blog->title,
            'post' => $blog->post,
            ]);
        
        $this->assertDatabaseHas('blog', [
            'title' => $blog->title,
        ]);

        $response->assertStatus(302);


        $id = Blog::max('id');
        $response = $this->withHeaders([
            'X-Header' => 'Value',
        ])->post('/remove_post/{id}', [
            'id' => $id
            ]);

        $this->assertDatabaseHas('blog', [
            'id' => $id,
        ]);


        $response = $this->withHeaders([
            'X-Header' => 'Value',
        ])->post('/remove_post/{id}', [
            'id' => $id,
            ]);

        // $response->assertStatus(500);

        Blog::query()->where('blog','=', 'Testbloggen')->delete();
        Blog::query()->where('id', '>', '0')->delete();
    }


    public function testPostChangePostById()
    {
        $blog = Blog::factory()->make();

        $response = $this->withHeaders([
            'X-Header' => 'Value',
        ])->post('/create_post', [
            'blog' => "Testbloggen",
            'title' => $blog->title,
            'post' => $blog->post,
            ]);

        $id = Blog::max('id');
        var_dump($id);
        
        $response = $this->withHeaders([
            'X-Header' => 'Value',
        ])->post('/change_post/{id}', [
            'id' => $id,
            'title' =>"Ny rubrik",
            'post' => "Uppdaterat"
            ]);
        
        $this->assertDatabaseHas('blog', [
                'title' => "Ny rubrik",
            ]);

            
        // $response->assertStatus(302);

        
    }



}
