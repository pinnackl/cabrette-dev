<?php

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Test\Factory;
use Test\TestCase;

class HomeControllerTest extends TestCase {

    public function setUp() {
        parent::setUp();

        DB::table('courses')->delete();
        DB::table('announces')->delete();
        DB::table('posts')->delete();

        $this->user = Factory::create('user');
        $this->be($this->user);
    }

    public function testIndex()
    {
        Factory::create('course', ['title' => 'Cours 1']);
        Factory::create('course', ['title' => 'Cours 2']);
        Factory::create('course', ['title' => 'Cours 3']);
        Factory::create('course', ['title' => 'Cours 4']);
        Factory::create('course', ['title' => 'Cours 5']);
        Factory::create('course', ['title' => 'Cours 6']);

        Factory::create('annonce', ['title' => 'Annonce 1']);
        Factory::create('annonce', ['title' => 'Annonce 2']);
        Factory::create('annonce', ['title' => 'Annonce 3']);
        Factory::create('annonce', ['title' => 'Annonce 4']);
        Factory::create('annonce', ['title' => 'Annonce 5']);
        Factory::create('annonce', ['title' => 'Annonce 6']);

        $this->call('GET', '/');

        $this->assertResponseOk();

        $this->see('Forum');
        $this->see('association');
        $this->see('cabrette');
        $this->see('cours');
        $this->see('agenda');
        $this->see('Petites Annonces');

        $this->see('Cours 2');
        $this->see('Cours 3');
        $this->see('Cours 4');
        $this->see('Cours 5');
        $this->see('Cours 6');
        $this->dontSee('Cours 1');

        $this->see('Annonce 3');
        $this->see('Annonce 6');
        $this->dontSee('Annonce 1');
    }

}
