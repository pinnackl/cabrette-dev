<?php namespace App\Helpers;

class UploadFileHelper {

    public static function moveToDestinationAndSaveInModel($file, $model, $column)
    {
        $model->{$column} = $file->getClientOriginalName();
        $file->move($model->upload_folder_path, $model->{$column});
    }

    public static function moveToDestinationAndSaveInModelCover($file, $model, $column)
    {
        $model->{$column} = $file->getClientOriginalName();
        $file->move($model->upload_cover_folder_path, $model->{$column});
    }

}
