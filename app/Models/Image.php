<?php

namespace App\Models;

class Image extends BaseModel {

    protected $table = 'images';
    public $uploadFolder = 'images';

    protected $fillable = ['image_filename', 'user_id', 'order', 'home'];

    public function user() { return $this->belongsTo('App\Models\User', 'user_id'); }

    public function announce() { return $this->belongsTo('App\Models\Announce', 'announce_id'); }

    public function getUploadFolderPathAttribute()
    {
        return public_path().'/uploads/'.$this->uploadFolder;
    }

}
