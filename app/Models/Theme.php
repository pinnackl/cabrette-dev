<?php

namespace App\Models;

class Theme extends BaseModel
{
    protected $table = 'themes';

    protected $fillable = ['title'];

    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }
}
