<?php

namespace App\Models;

class Course extends BaseModel
{
    protected $table = 'courses';

    protected $fillable = ['title', 'content', 'author'];

}
