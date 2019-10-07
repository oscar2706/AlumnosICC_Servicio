<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Alumno;

class AlumnoController extends Controller
{
    public function index()
    {
        return Alumno::all();
    }

    public function show(Alumno $alumno)
    {
        return $alumno;
    }

    public function showFromSeccion($seccion_id)
    {
        return DB::table('Alumnos')
            ->where('seccion_id', '=', $seccion_id)
            ->get();
    }

    public function credits($matricula)
    {
        return DB::table('Materias')
            ->join('Materias_cursadas', 'Materias.clave', '=', 'Materias_cursadas.clave')
            ->where('Materias_cursadas.matricula', '=', $matricula)
            ->sum('creditos');
    }

    public function tutor($matricula)
    {
        return DB::table('Alumnos')
            ->join('Seccions', 'Alumnos.seccion_id', '=', 'Seccions.id')
            ->join('Trabajadors', 'Seccions.trabajador_id', '=', 'Trabajadors.id')
            ->where('Alumnos.matricula', '=', $matricula)
            ->get('Trabajadors.nombre');
    }

    public function store(Request $request)
    {
        $alumno = Alumno::create($request->all());

        return response()->json($alumno, 201);
    }

    public function update(Request $request, Alumno $alumno)
    {
        $alumno->update($request->all());

        return response()->json($alumno, 200);
    }

    public function delete(Alumno $alumno)
    {
        $alumno->delete();

        return response()->json(null, 204);
    }
}
