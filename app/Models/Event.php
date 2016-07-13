<?php

namespace App\Models;

class Event extends BaseModel
{
    public $uploadFolder = 'events';

    protected $table = 'events';

    protected $fillable = ['title', 'content', 'address', 'city', 'user_id', 'cover_event'];

    protected $dates = ['date_start', 'date_end'];

    protected $visible = [
        '_id',
        'coach_id',
        'user_id',
        'date_start',
        'date_end',
        'title',
        'content',
        'address',
        'city'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function getUploadFolderPathAttribute()
    {
        return public_path().'/uploads/'.$this->uploadFolder;
    }
}
