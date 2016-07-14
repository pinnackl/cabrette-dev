<?php

namespace App\Models;

class Comment extends BaseModel
{
    protected $table = 'comments';

    protected $fillable = ['content', 'state', 'author', 'post_id'];

    public function post()
    {
        return $this->belongsTo('App\Models\Post', 'post_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'author');
    }

}
