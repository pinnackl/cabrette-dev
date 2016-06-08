<?php

namespace App\Models;

class Post extends BaseModel
{
    public $uploadFolder = 'video';
    public $uploadCoverFolder = 'cover';

    protected $table = 'posts';

    protected $fillable = ['title', 'content', 'author','images_ids', 'type', 'category_id', 'theme_id', 'state'];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'author');
    }

}
