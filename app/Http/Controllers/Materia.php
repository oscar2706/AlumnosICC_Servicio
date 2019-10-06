<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class Materia
{
    private $clave;
    private $cursada;
    private $matricula;
    private $materias_requisito;
    private $materias_siguientes;

    public function __construct($clave, $matricula)
    {
        $this->clave = $clave;
        $this->matricula = $matricula;
        $this->cursada = DB::table('Materias_cursadas')
            ->where('clave', '=', $clave)
            ->where('matricula', '=', $matricula)
            ->get()->isNotEmpty();

        $this->materias_requisito = [];
        $i = 0;
        foreach (DB::table('Prerequisitos')
            ->where('clave', '=', $clave)
            ->get('requisito') as $materia) {
            $this->materias_requisito[$i] = $materia->requisito;
            $i++;
        }

        $this->materias_siguientes = [];
        $i = 0;
        foreach (DB::table('Subsecuentes')
            ->where('clave', '=', $clave)
            ->get('subsecuente')->values() as $materia) {
            $this->materias_siguientes[$i] = $materia->subsecuente;
            $i++;
        }
    }

    public function estaMarcada()
    {
        return $this->cursada;
    }

    public function getRequisitos()
    {
        return $this->materias_requisito;
    }

    public function getSiguientes()
    {
        return $this->materias_siguientes;
    }

    public function cumplePrerequisitos()
    {
        if (sizeof($this->materias_requisito)  == 0)
            return true;
        else {
            $cumple = true;
            while (sizeof($this->materias_requisito)  > 0) {
                $requisito = array_pop($this->materias_requisito);
                $materia_requisito = new Materia($requisito, $this->matricula);

                if (!$materia_requisito->estaMarcada())
                    $cumple = false;
            }
            return $cumple;
        }
    }
}
