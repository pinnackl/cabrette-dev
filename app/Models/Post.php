<?php

namespace App\Models;

class Post extends BaseModel
{
    public $uploadFolder = 'video';
    public $uploadCoverFolder = 'cover';

    protected $table = 'posts';

    protected $fillable = ['title', 'content', 'author','images_ids', 'type', 'category_id'];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'author');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
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
