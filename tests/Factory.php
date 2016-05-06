<?php

namespace Test;

use User;

class Factory
{
    public static function create($model, $customParams = [])
    {
        $object = self::build($model, $customParams);
        $object->save();
        return $object;
    }

    /**
     * @param $model
     * @param array $customParams
     * @return User|
     */
    public static function build($model, $customParams = [])
    {
        $faker = \Faker\Factory::create();

        if (! str_contains($model, 'App\Models')) {
            $model = 'App\Models\\'.$model;
        }

        switch ($model) {
            case 'App\Models\User':
                $baseParams = ['email' => $faker->email, 'password' => 'abcdef'];

                $after = function ($user, $params) {
                    $user->password = $params['password'];
                    $user->save();
                };

                break;

            case 'App\Models\Evaluation':
                $baseParams = ['title' => 'factory title'];
                break;

            case 'App\Models\Activity':
                $baseParams = ['back_office_title' => 'Factory BO Title', 'type' => 'text', 'title' => 'Factory Title'];
                break;

            case 'App\Models\Module':
                $baseParams = ['back_office_title' => 'Factory BO Title', 'title' => 'Factory Title'];
                break;

            case 'App\Models\Course':
                $baseParams = ['back_office_title' => 'Factory BO Title', 'title' => 'Factory Title'];
                break;

            case 'App\Models\CourseProgress':
                $baseParams = ['course_id' => 'ID_COURSE'];
                break;

            case 'App\Models\Question':
                $baseParams = ['order' => 1, 'answer' => true];
                break;

            default:
                $baseParams = [];
        }

        $params = array_merge($baseParams, $customParams);
        $object = new $model($params);

        if (isset($after)) {
            $after($object, $params);
        }

        return $object;
    }
}


