<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Seccion;

class SeccionController extends Controller
{
    public function index()
    {
        return Seccion::all();
    }

    public function show(Seccion $seccion)
    {
        return $seccion;
    }

    public function showFromTrabajador($trabajador_id)
    {
        return DB::table('Seccions')
            ->where('trabajador_id', '=', $trabajador_id)
            ->get();
    }

    public function store(Request $request)
    {
        $seccion = Seccion::create($request->all());

        return response()->json($seccion, 201);
    }

    public function update(Request $request, Seccion $seccion)
    {
        $seccion->update($request->all());

        return response()->json($seccion, 200);
    }

    public function delete(Seccion $seccion)
    {
        $seccion->delete();

        return response()->json(null, 204);
    }
}
