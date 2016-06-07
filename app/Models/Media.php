<?php

namespace App\Models;

class Media extends BaseModel
{

    protected $table = 'medias';

    protected $fillable = ['title', 'type', 'filename', 'author'];

}
