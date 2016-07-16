<?php

namespace App\Models;

class Post extends BaseModel
{
    public $uploadFolder = 'posts';
    public $uploadCoverFolder = 'cover';

    protected $table = 'posts';

    protected $fillable = ['title', 'content', 'author','images_ids', 'type', 'category_id', 'theme_id', 'state'];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'author');
    }

    public function theme()
    {
        return $this->belongsTo('App\Models\Theme', 'theme_id');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment')->where('state', true);
    }

    public function getUploadFolderPathAttribute()
    {
        return public_path().'/uploads/'.$this->uploadFolder;
    }

    public function getUploadCoverFolderPathAttribute()
    {
        return public_path().'/uploads/'.$this->uploadCoverFolder;
    }
}
