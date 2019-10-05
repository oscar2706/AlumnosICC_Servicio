<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seccion extends Model
{
    // public $incrementing = false;
    public $timestamps = false;

    public function alumnos()
    {
        return $this->hasMany('App\Alumno');
    }
}
