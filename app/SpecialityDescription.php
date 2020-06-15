<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpecialityDescription extends Model
{
    protected $table = 'specialties_description';

    protected $fillable = [
        'form', 'specialization', 'period', 'short_period',
        'tests', 'education', 'speciality_id', 'plan'
    ];

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
}
