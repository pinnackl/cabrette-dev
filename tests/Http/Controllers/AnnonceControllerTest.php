<?php

use App\Models\Announce;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Test\Factory;
use Test\TestCase;

class AnnonceControllerTest extends TestCase {

    public function setUp() {
        parent::setUp();
        DB::table('announces')->delete();

        $this->user = Factory::create('user');
        $this->be($this->user);
    }

    public function testIndex()
    {
        $this->call('GET', 'announces');

        $this->assertResponseOk();
        $this->assertViewHas('announces');
    }

    public function testCreate()
    {
        $this->call('GET', 'announces/create');

        $this->assertResponseOk();
    }

    public function testStore()
    {
        $countAnnonces = Announce::count();
        $inputs = [
            'title' => 'title annonce',
            'content' => 'Content annonce'
        ];

        $this->call('POST', 'announces', $inputs);

        $this->assertEquals($countAnnonces + 1, Announce::count());
        $this->assertRedirectedTo('announces');
    }

    public function testEdit()
    {
        $annonce = Factory::create('annonce');

        $this->call('GET', 'announces/'.$annonce->id.'/edit');

        $this->assertResponseOk();
    }

    public function testUpdate()
    {
        $oldTitle = 'Old title annonce';
        $newTitle = 'New title annonce';
        $annonce = Factory::create('annonce', ['title' => $oldTitle]);
        $inputs = [
            'title' => $newTitle,
        ];

        $this->shouldRedirectBack();
        $this->call('PUT', 'announces/'.$annonce->id, $inputs);

        $freshPost = Announce::find($annonce->id);
        $this->assertEquals($newTitle, $freshPost->title);
    }

    public function testDestroy()
    {
        $annonce = Factory::create('annonce');
        $countAnnonces = Announce::count();

        $this->shouldRedirectBack();
        $this->call('DELETE', 'announces/'.$annonce->id);

        $this->assertEquals($countAnnonces - 1, Announce::count());
    }
}
