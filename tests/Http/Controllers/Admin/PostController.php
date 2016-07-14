<?php

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Test\Factory;
use Test\TestCase;

class PostControllerTest extends TestCase {

    public function setUp() {
        parent::setUp();
        DB::table('posts')->delete();

        $this->admin = Factory::create('admin');
        $this->be($this->admin);
    }

    public function testIndex()
    {
        $this->call('GET', 'admin/posts');

        $this->assertResponseOk();
        $this->assertViewHas('posts');
    }

    public function testCreate()
    {
        $this->call('GET', 'admin/posts/create');

        $this->assertResponseOk();
    }

    public function testStore()
    {
        $countPosts = Post::count();
        $inputs = [
            'title' => 'title POst',
            'content' => 'Content posts'
        ];

        $this->call('POST', 'admin/posts', $inputs);

        $this->assertEquals($countPosts + 1, Post::count());
        $this->assertRedirectedTo('admin/forums');
    }

    public function testEdit()
    {
        $theme = Factory::create('post');

        $this->call('GET', 'admin/posts/'.$theme->id.'/edit');

        $this->assertResponseOk();
    }

    public function testUpdate()
    {
        $oldTitle = 'Old title';
        $newTitle = 'New title';
        $post = Factory::create('post', ['title' => $oldTitle]);
        $inputs = [
            'title' => $newTitle,
        ];

        $this->shouldRedirectBack();
        $this->call('PUT', 'admin/posts/'.$post->id, $inputs);

        $freshPost = Post::find($post->id);
        $this->assertEquals($newTitle, $freshPost->title);
    }

    public function testDestroy()
    {
        $post = Factory::create('post');
        $countPosts = Post::count();

        $this->shouldRedirectBack();
        $this->call('DELETE', 'admin/posts/'.$post->id);

        $this->assertEquals($countPosts - 1, Post::count());
    }
}
