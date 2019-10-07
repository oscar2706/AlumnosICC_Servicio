<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Materias_proyeccion;

class MateriaProyeccionController extends Controller
{
    public function index()
    {
        return Materias_proyeccion::all();
    }

    public function store(Request $request)
    {
        Materias_proyeccion::create($request->all());
        return response()->json(true, 201);
    }
}
