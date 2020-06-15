<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menu';

    protected $fillable = [
        'parent_id',
        'name',
        'url',
        'sort_order'
    ];

    public $timestamps = false;

    public function parent()
    {
        return $this->belongsTo(Menu::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Menu::class, 'parent_id');
    }

    public function scopeOfSort($query, $sort)
    {
        foreach ($sort as $column => $direction) {
            $query->orderBy($column, $direction);
        }

        return $query;
    }

    public function removeRelation(){
        foreach ($this->children()->get() as $item){
            $item->parent_id = $this->parent_id == null ? null : $this->parent_id;
            $item->save();
        }
    }

    public function remove()
    {
        $this->removeRelation();
        $this->delete();
    }

    public static function add($fields)
    {
        $menu = new static;
        $menu->fill($fields);
        $menu->save();
        return $menu;
    }

    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }

    public function hasChildren()
    {
        return $this->children()->count() > 0;
    }

    public function hasParent()
    {
        return $this->parent()->count() > 0;
    }
}
