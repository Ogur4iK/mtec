<?php

namespace App;

use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Speciality extends Model
{
    use Sluggable;

    protected $table = 'specialties';

    protected $fillable = [
        'code', 'name', 'qualification', 'img', 'img-bg'
    ];

    public function descriptions()
    {
        return $this->hasMany(SpecialityDescription::class);
    }

    public function getDescriptions()
    {
        return $this->descriptions()->get();
    }

    public function makeReception()
    {
        $this->is_reception = 1;
        $this->save();
    }

    public function makeNoReception()
    {
        $this->is_reception = 0;
        $this->save();
    }

    public function toggleReception($value)
    {
        return $value == null ? $this->makeNoReception() : $this->makeReception();
    }

    public function isReception()
    {
        return $this->is_reception == 0 ? false : true;
    }

    public function getReceptionStatus()
    {
        return $this->is_reception == 0 ? '' : 'checked';
    }

    public static function add($fields)
    {
        $speciality = new static;
        $speciality->fill($fields);
        $speciality->save();
        return $speciality;
    }

    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
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

    public function getImage()
    {
        if($this->img == null)
        {
            return '/img/no-image.png';
        }
        return '/uploads/' . $this->img;
    }

    public function uploadBgImage($img_bg)
    {
        if($img_bg == null) { return; }

        $this->removeBgImage();
        $filename = str_random(10) . '.' . $img_bg->extension();
        $img_bg->storeAs('uploads', $filename);
        $this->img_bg = $filename;
        $this->save();
    }

    public function removeBgImage()
    {
        if($this->img_bg != null)
        {
            Storage::delete('uploads/' . $this->img_bg);
        }
    }

    public function getBgImage()
    {
        if($this->img_bg == null)
        {
            return '/img/nav-bg.jpg';
        }
        return '/uploads/' . $this->img_bg;
    }

    public function remove()
    {
        $this->removeImage();
        $this->removeBgImage();
        $this->delete();
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name',
                'onUpdate' => true
            ]
        ];
    }
}
