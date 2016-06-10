<?php

namespace App\Models;

class Category extends BaseModel
{

    protected $table = 'categories';

    protected $fillable = ['title'];

    public function announces()
    {
        return $this->hasMany('App\Models\Announces');
    }

}
