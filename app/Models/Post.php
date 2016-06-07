<?php

namespace App\Models;

class Post extends BaseModel
{
    public $uploadFolder = 'video';
    public $uploadCoverFolder = 'cover';

    protected $table = 'posts';

    protected $fillable = ['title', 'content', 'author','images_ids', 'type', 'category_id', 'theme_id'];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'author');
    }

    public function theme()
    {
        return $this->hasOne('App\Models\Theme', 'theme_id');
    }
}
