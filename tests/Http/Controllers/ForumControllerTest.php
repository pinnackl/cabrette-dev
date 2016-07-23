<?php

use Illuminate\Support\Facades\DB;
use Test\Factory;
use Test\TestCase;

class ForumControllerTest extends TestCase {

    public function setUp() {
        parent::setUp();
        DB::table('posts')->delete();

        $this->user = Factory::create('user');
        $this->be($this->user);
    }

    public function testShowPost()
    {
//        $post = Factory::create('post', ['link_url' => 'testurl', 'title' => 'Title', 'content' => 'content']);
//        Factory::create('comment', ['post_id' => $post->id, 'content' => 'Commentaire 1', 'state' => true]);
//        Factory::create('comment', ['post_id' => $post->id, 'content' => 'Commentaire 2', 'state' => '']);
//
//        var_dump($post->link_url);
//
//        $this->call('GET', 'forum/'.$post->link_url);
//
//        $this->assertResponseOk();
//        $this->see('Title');
//        $this->see('content');
//        //$this->see('Commentaire 1');
//        $this->dontsee('Commentaire 2');
    }
}
