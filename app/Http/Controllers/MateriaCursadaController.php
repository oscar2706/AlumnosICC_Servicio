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
        $materias_cursada = Materias_cursada::create($request->all());

        return response()->json($materias_cursada, 201);

        // $materia = new Materia('CCOS 001', 201700181);
        // $materia = new Materia('CCOS 007', 201700181);
        // $materia = new Materia('ICCS 006', 201700181);
        // $materia = new Materia('ICCS 254', 201700181);
        // $materia = new Materia('CCOS 261', 201700181);
        // return [$materia->estaMarcada()];
        // return [$materia->cumplePrerequisitos()];
        // return $materia->getRequisitos();
        // return $materia->getSiguientes();
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
