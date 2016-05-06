<?php

namespace App\Models;

class Post extends BaseModel
{
    public $uploadFolder = 'video';
    public $uploadCoverFolder = 'cover';

    protected $table = 'posts';

    protected $fillable = ['title', 'content', 'author', 'video_filename','cover_filename', 'type', 'compositeur', 'realisateur', 'sound_design', 'client', 'agence', 'groupe', 'first_video'];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'author');
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
