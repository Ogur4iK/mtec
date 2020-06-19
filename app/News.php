<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Cviebrock\EloquentSluggable\Sluggable;

class News extends Model
{
    use Sluggable;

    protected $fillable = [
        'title', 'content', 'img','description'
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title',
                'onUpdate' => true,
                'maxLength' => 60
            ]
        ];
    }

    public static function add($fields)
    {
        $news = new static;
        $news->fill($fields);
        $news->save();
        return $news;
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

    public function  getTitle()
    {
        return Str::limit($this->title, 80);
    }

    public function getMonth()
    {
        switch ($this->created_at->month)
        {
            case 1: return 'Янв';
            case 2: return 'Фев';
            case 3: return 'Мар';
            case 4: return 'Апр';
            case 5: return 'Май';
            case 6: return 'Июн';
            case 7: return 'Июл';
            case 8: return 'Авг';
            case 9: return 'Сен';
            case 10: return 'Окт';
            case 11: return 'Ноя';
            case 12: return 'Дек';
        }
    }

    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }

    public function viewsInc()
    {
        $this->views ++;
        $this->save();
    }

    public function getDate()
    {
        return Carbon::parse($this->created_at)->format('d.m.Y');
    }
}
