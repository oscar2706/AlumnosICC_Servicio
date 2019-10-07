<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Avance extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'fecha_inicio',
        'fecha_fin'
    ];
}
