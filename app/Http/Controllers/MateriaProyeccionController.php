<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Materias_proyeccion;

class MateriaProyeccionController extends Controller
{
    public function index()
    {
        return Materias_proyeccion::all();
    }

    public function materiasProyeccion(Request $request)
    {
        if ($request->input('fecha_inicio') && $request->input('fecha_fin')) {
            return DB::select(DB::raw("SELECT count(mp.clave) as total, m.nombre FROM alumnosicc.materias_proyeccions as mp
            inner join alumnosicc.materias as m on m.clave = mp.clave
            where mp.fecha between '". $request->input('fecha_inicio') ."' and '". $request->input('fecha_fin') ."'
            group by m.nombre;"));
        } else
            return response()->json([
                'error' => 'fechas no especificadas',
            ], 404);
    }

    public function store(Request $request)
    {
        Materias_proyeccion::create($request->all());
        return response()->json(true, 201);
    }
}
