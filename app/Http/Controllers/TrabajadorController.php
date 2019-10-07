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

    public function update(Request $request, Trabajador $trabajador)
    {
        $trabajador->update($request->all());

        return response()->json($trabajador, 200);
    }
}
