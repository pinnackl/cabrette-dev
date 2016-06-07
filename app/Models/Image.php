<?php

namespace App\Models;

class Image extends BaseModel {

    protected $table = 'images';
    public $uploadFolder = 'images';

    protected $fillable = ['image_filename', 'announce_id', 'user_id'];

    public function user() { return $this->belongsTo('App\Models\User', 'user_id'); }

    public function announce() { return $this->belongsTo('App\Models\Announce', 'announce_id'); }

    public function getUploadFolderPathAttribute()
    {
        return public_path().'/uploads/'.$this->uploadFolder;
    }

}
