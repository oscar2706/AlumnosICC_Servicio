<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Materias_cursada;

class MateriaCursadaController extends Controller
{
    public function index()
    {
        return Materias_cursada::all();
    }

    public function showFromAlumno($matricula)
    {
        return DB::table('Materias_cursadas')
            ->where('matricula', '=', $matricula)
            ->get();
    }

    public function store(Request $request)
    {
        $materias_cursada = Materias_cursada::create($request->all());

        return response()->json($materias_cursada, 201);
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
