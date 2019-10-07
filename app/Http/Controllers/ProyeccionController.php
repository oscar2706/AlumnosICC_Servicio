<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Proyeccion;

class ProyeccionController extends Controller
{
    public function index()
    {
        return Proyeccion::all();
    }

    public function show(Proyeccion $proyeccion)
    {
        return $proyeccion;
    }

    public function store(Request $request)
    {
        $proyeccion = Proyeccion::create($request->all());

        return response()->json($proyeccion, 201);
    }
}
