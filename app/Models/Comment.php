<?php

namespace App\Models;

class Comment extends BaseModel
{
    protected $table = 'comments';

    protected $fillable = ['content', 'state', 'author'];

    public function post()
    {
        return $this->belongsTo('App\Models\Post');
    }

}
