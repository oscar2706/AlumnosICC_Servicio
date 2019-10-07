<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Materia;
use App\Http\Controllers\Materia as MateriaClass;
use Illuminate\Database\Eloquent\Collection;

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

    public function proyeccion($matricula)
    {
        $materias = collect();
        foreach (Materia::all() as $materia) {
            $materiaObj = new MateriaClass($materia->clave, $matricula);
            if ($materiaObj->cumplePrerequisitos() && !$materiaObj->estaMarcada()) {
                $materias->add(DB::table('Materias')
                    ->where('clave', '=', $materiaObj->getClave())
                    ->first());
            }
        }
        return $materias->all();
    }
}
