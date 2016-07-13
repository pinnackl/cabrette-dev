<?php

namespace Test;

use App\Models\User;

class Factory
{
    public static function create($model, $customParams = array())
    {
        $object = self::build($model, $customParams);
        $object->save();
        return $object;
    }

    public static function build($model, $customParams = array())
    {
        switch ($model) {
            case 'admin':
                $baseParams = array('first_name' => 'factory first name', 'last_name' => 'factory last name', 'email' => str_random(8).'@factory.com', 'password' => 'factorypassword', 'role' => 'admin');
                $params = array_merge($baseParams, $customParams);
                $user = new User($params);
                $user->password = bcrypt($params['password']);
                return $user;

            case 'user':
                $baseParams = array('first_name' => 'factory first name', 'last_name' => 'factory last name', 'email' => str_random(8).'@factory.com', 'password' => 'factorypassword', 'role' => 'user');
                $params = array_merge($baseParams, $customParams);
                $user = new User($params);
                $user->password = bcrypt($params['password']);
                return $user;
        }

        throw new Exception('No Factory found for "' . $model . '"');
    }

}


