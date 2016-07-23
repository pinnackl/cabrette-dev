<?php

use App\Models\Theme;
use Illuminate\Support\Facades\DB;
use Test\Factory;
use Test\TestCase;

class ThemeControllerTest extends TestCase {

    public function setUp() {
        parent::setUp();
        DB::table('theme')->delete();

        $this->admin = Factory::create('admin');
        $this->be($this->admin);
    }

    public function testIndex()
    {
        $this->call('GET', 'admin/themes');

        $this->assertResponseOk();
        $this->assertViewHas('themes');
    }

    public function testCreate()
    {
        $this->call('GET', 'admin/themes/create');

        $this->assertResponseOk();
    }

    public function testStore()
    {
        $countThemes = Theme::count();
        $inputs = [
            'title' => 'title theme',
        ];

        $this->call('POST', 'admin/themes', $inputs);

        $this->assertEquals($countThemes + 1, Theme::count());
        $this->assertRedirectedTo('admin/themes');
    }

    public function testEdit()
    {
        $theme = Factory::create('theme');

        $this->call('GET', 'admin/themes/'.$theme->id.'/edit');

        $this->assertResponseOk();
    }

    public function testUpdate()
    {
        $oldTitle = 'Old title';
        $newTitle = 'New title';
        $theme = Factory::create('theme', ['title' => $oldTitle]);
        $inputs = [
            'title' => $newTitle,
        ];

        $this->shouldRedirectBack();
        $this->call('PUT', 'admin/themes/'.$theme->id, $inputs);

        $freshTheme = Theme::find($theme->id);
        $this->assertEquals($newTitle, $freshTheme->title);
    }

    public function testDestroy()
    {
        $theme = Factory::create('theme');
        $countThemes = Theme::count();

        $this->shouldRedirectBack();
        $this->call('DELETE', 'admin/themes/'.$theme->id);

        $this->assertEquals($countThemes - 1, Theme::count());
    }


}
