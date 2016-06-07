<?php

namespace App\Models;

class Theme extends BaseModel
{
    protected $table = 'themes';

    protected $fillable = ['title'];

    public function posts()
    {
        return $this->hasMany('App\Models\Post', 'author');
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
