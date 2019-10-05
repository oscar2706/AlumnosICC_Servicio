<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    protected $primaryKey = 'clave';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
}
