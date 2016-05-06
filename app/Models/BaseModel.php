<?php
namespace App\Models;
use Jenssegers\Mongodb\Model as Eloquent;
use Starter\ModelValidation\ModelValidator;

class BaseModel extends Eloquent
{
    use ModelValidator;

    public static function boot()
    {
        parent::boot();
        static::saving(function ($object) {
            $object->validate();
        });
    }
}