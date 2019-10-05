<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proyeccion extends Model
{
    protected $primaryKey = 'matricula';
    public $incrementing = false;
    public $timestamps = false;
}
