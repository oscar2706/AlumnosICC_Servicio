<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Materias_cursada;
use App\Http\Controllers\Materia;

class MateriaCursadaController extends Controller
{
    public function index()
    {
        return Materias_cursada::all();
    }

    public function show(Request $request)
    {
        if ($request->input('clave') && $request->input('matricula')) {
            $materia_encontrada = DB::table('Materias_cursadas')
                ->where('clave', '=', $request->input('clave'))
                ->where('matricula', '=', $request->input('matricula'))
                ->get()->isNotEmpty();
            if ($materia_encontrada)
                return ['marcada' => true];
            else
                return ['marcada' => false];
        } else
            return response()->json([
                'error' => 'materia y/o clave no especificada',
            ], 404);
    }

    public function showFromAlumno($matricula)
    {
        return DB::table('Materias_cursadas')
            ->where('matricula', '=', $matricula)
            ->get();
    }

    public function store(Request $request)
    {
        $materia = new Materia($request->input('clave'), $request->input('matricula'));

        if ($materia->cumplePrerequisitos() && !$materia->estaMarcada()) {
            Materias_cursada::create($request->all());
            return response()->json(true, 201);
        } else {
            return response()->json(false, 200);
        }
    }

    public function delete(Request $request)
    {
        $clave = $request->input('clave');
        $matricula = $request->input('matricula');
        if ($clave && $matricula) {
            $materia_cursada = new  Materias_cursada;
            $materia_cursada->clave = $clave;
            $materia_cursada->matricula = $matricula;

            $materia_encontrada = DB::table('Materias_cursadas')
                ->where('clave', '=', $clave)
                ->where('matricula', '=', $matricula)
                ->get()->isNotEmpty();
            if ($materia_encontrada) {
                DB::table('Materias_cursadas')
                    ->where('clave', '=', $clave)
                    ->where('matricula', '=', $matricula)
                    ->delete();
                return response()->json(null, 204);
            } else {
                return response()->json([
                    'error' => 'Resource not found',
                ], 404);
            }
        } else
            return ['error' => 'Clave y/o matricula no especificada'];
    }
}
