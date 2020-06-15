<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $fillable = [
        'year', 'description'
    ];

    protected $table = 'history';

    public static function add($fields)
    {
        $news = new static;
        $news->fill($fields);
        $news->save();
        return $news;
    }

    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }
}
