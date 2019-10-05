<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Trabajador;
use App\Http\Controllers\SeccionController;

class TrabajadorController extends Controller
{
    public function index()
    {
        return Trabajador::all();
    }

    public function show(Trabajador $trabajador)
    {
        return $trabajador;
    }

    public function showSeccions($trabajador)
    {
        SeccionController::index();
    }
}
