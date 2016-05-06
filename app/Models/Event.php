<?php

namespace App\Models;

class Event extends BaseModel
{

    protected $table = 'events';

    protected $fillable = ['title', 'date_start', 'date_end', 'content', 'address', 'city'];

}
