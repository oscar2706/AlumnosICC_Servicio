<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Avance;

class AvanceController extends Controller
{
    public function index()
    {
        return Avance::all();
    }

    public function show(Avence $avance)
    {
        return $avance;
    }

    public function store(Request $request)
    {
        $avance = Avance::create($request->all());

        return response()->json($avance, 201);
    }
}
