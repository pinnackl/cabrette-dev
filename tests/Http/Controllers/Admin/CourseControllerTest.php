<?php

use App\Models\Course;
use Illuminate\Support\Facades\DB;
use Test\Factory;
use Test\TestCase;

class CourseControllerTest extends TestCase {

    public function setUp() {
        parent::setUp();
        DB::table('courses')->delete();


        $this->admin = Factory::create('admin');
        $this->be($this->admin);
    }

    public function testIndex()
    {
        $this->call('GET', 'admin/courses');

        $this->assertResponseOk();
        $this->assertViewHas('courses');
    }

    public function testCreate()
    {
        $this->call('GET', 'admin/courses/create');

        $this->assertResponseOk();
    }

    public function testStore()
    {
        $theme = Factory::create('theme');
        $countCourses = Course::count();
        $inputs = [
            'title' => 'Prénom',
            'content' => 'Nom',
            'theme' => $theme->id
        ];

        $this->call('POST', 'admin/courses', $inputs);

        $this->assertEquals($countCourses + 1, Course::count());
        $this->assertRedirectedTo('admin/courses');
    }

    public function testEdit()
    {
        $course = Factory::create('course');

        $this->call('GET', 'admin/courses/'.$course->id.'/edit');

        $this->assertResponseOk();
    }

    public function testUpdate()
    {
        $theme = Factory::create('theme');
        $oldTitle = 'Old title';
        $newTitle = 'New title';
        $course = Factory::create('course', ['title' => $oldTitle, 'theme' =>  $theme->id]);
        $inputs = [
            'title' => $newTitle,
            'content' => $course->content,
        ];

        $this->shouldRedirectBack();
        $this->call('PUT', 'admin/courses/'.$course->id, $inputs);

        $freshCourse = Course::find($course->id);
        $this->assertEquals($newTitle, $freshCourse->title);
    }

    public function testDestroy()
    {
        $course = Factory::create('course');
        $countCourses = Course::count();

        $this->shouldRedirectBack();
        $this->call('DELETE', 'admin/courses/'.$course->id);

        $this->assertEquals($countCourses - 1, Course::count());
    }

}
