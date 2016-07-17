<?php

namespace App\Models;

class Media extends BaseModel
{
    public $uploadFolder = 'medias';

    protected $table = 'medias';

    protected $fillable = ['title', 'type', 'filename', 'author'];

    public function getUploadFolderPathAttribute()
    {
        return public_path().'/uploads/'.$this->uploadFolder;
    }
}
