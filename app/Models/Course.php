<?php

namespace App\Models;

class Course extends BaseModel
{
    protected $table = 'courses';

    protected $fillable = ['title', 'content', 'author', 'theme_id'];

    public function theme()
    {
        return $this->hasOne('App\Models\Theme', 'theme_id');
    }

}
