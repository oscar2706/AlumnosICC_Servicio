<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materias_proyeccion extends Model
{
    protected $primaryKey = 'matricula';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'matricula',
        'clave',
        'fecha'
    ];
}
