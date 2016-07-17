<?php

namespace App\Models;

class Contact extends BaseModel
{
    protected $table = 'contacts';

    protected $fillable = ['first_name', 'last_name', 'email', 'message'];

}
