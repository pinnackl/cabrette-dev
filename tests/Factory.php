<?php

namespace Test;

use App\Models\Announce;
use App\Models\Course;
use App\Models\Post;
use App\Models\Theme;
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

            case 'course':
                $baseParams = array('title' => 'factory title', 'last_name' => 'factory content');
                $params = array_merge($baseParams, $customParams);
                $course = new Course($params);
                return $course;

            case 'theme':
                $baseParams = array('title' => 'factory title');
                $params = array_merge($baseParams, $customParams);
                $theme = new Theme($params);
                return $theme;

            case 'post':
                $baseParams = array('title' => 'factory title', 'content' => 'factory content', 'state' => 1, 'link_url' => 'factorylink');
                $params = array_merge($baseParams, $customParams);
                $post = new Post($params);
                return $post;

            case 'annonce':
                $baseParams = array('title' => 'factory title', 'content' => 'factory content');
                $params = array_merge($baseParams, $customParams);
                $annonce = new Announce($params);
                return $annonce;

            case 'comment':
                $baseParams = array('content' => 'factory content');
                $params = array_merge($baseParams, $customParams);
                $comment = new Announce($params);
                return $comment;
        }

        throw new Exception('No Factory found for "' . $model . '"');
    }

}


