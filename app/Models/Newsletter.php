<?php

namespace App\Models;

class Newsletter extends BaseModel
{
    protected $table = 'newsletter';

    protected $fillable = ['email', 'state'];

}
