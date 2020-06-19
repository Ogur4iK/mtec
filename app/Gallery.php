<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class Gallery extends Model
{
    protected $table = 'gallery';

    public static function uploadImages($images)
    {
        if ($images != null)
        {
            foreach ($images as $image){
                $galley = new static;
                $galley->uploadImage($image);
            }
        }
    }

    public function uploadImage($img)
    {
        if($img == null) { return; }
        $this->removeImage();
        $filename = str_random(10) . '.' . $img->extension();
        $img->storeAs('uploads', $filename);
        $this->img = $filename;
        $this->save();
    }

    public function removeImage()
    {
        if($this->img != null)
        {
            Storage::delete('uploads/' . $this->img);
        }
    }

    public function remove()
    {
        $this->removeImage();
        $this->delete();
    }

    public function getImage()
    {
        if($this->img == null)
        {
            return '/img/no-image.png';
        }
        return '/uploads/' . $this->img;
    }
}
