<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $primaryKey = 'matricula';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'matricula',
        'nombre',
        'password',
        'avance_realizado',
        'proyeccion_realizada',
        'activo',
        'seccion_id'
    ];
}
