<?php

namespace App\Models;

class Announce extends BaseModel
{
    protected $table = 'announces';

    protected $fillable = ['title', 'content', 'images_ids', 'author'];

    public function getImagesIdsAttribute($value)
    {
        return is_array($value) ? $value : array();
    }

    public function attachImage($id, $data = array())
    {
        $data['_id'] = new MongoId($id);
        $this->images_ids = array_merge($this->images_ids, array((string)$data['_id'] => $data));
    }

    public function updateImage($image_id, $data)
    {
        $data = array_merge($this->images_ids[$image_id], $data);
        $this->attachImage($image_id, $data);
    }

    public function detachImage($image_id)
    {
        $images_ids = $this->places_ids;
        unset($images_ids[$image_id]);
        $this->images_ids = $images_ids;
    }

    public function images()
    {
        $ids = array();
        foreach ($this->images_ids as $record) {
            $ids[] = $record['_id'];
        }
        return Image::whereIn('_id', $ids);
    }

}
