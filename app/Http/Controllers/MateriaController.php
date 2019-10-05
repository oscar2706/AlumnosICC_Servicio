<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Materia;

class MateriaController extends Controller
{
    public function index()
    {
        return Materia::all();
    }

    public function show(Materia $materia)
    {
        return $materia;
    }
}
