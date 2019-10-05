<?php

use Illuminate\Http\Request;

// Alumnos
Route::get('alumnos', 'AlumnoController@index');
Route::get('alumnos/{alumno}', 'AlumnoController@show');
// Route::post('alumnos', 'AlumnoController@store');
Route::put('alumnos/{alumno}', 'AlumnoController@update');
Route::get('alumnos/{alumno}/materias_cursadas', 'MateriaCursadaController@showFromAlumno');

// Trabajadores
Route::get('trabajadores', 'TrabajadorController@index');
Route::get('trabajadores/{trabajador}', 'TrabajadorController@show');
Route::get('trabajadores/{trabajador}/secciones', 'SeccionController@showFromTrabajador');

// Secciones
Route::get('secciones', 'SeccionController@index');
Route::get('secciones/{seccion}', 'SeccionController@show');
Route::get('secciones/{seccion}/alumnos', 'AlumnoController@showFromSeccion');

//Materias
Route::get('materias', 'MateriaController@index');
Route::get('materias/{materia}', 'MateriaController@show');

//Materias cursadas
Route::get('materias_cursadas', 'MateriaCursadaController@index');
// Route::get('materias_cursadas/{materia_cursada}', 'MateriaCursadaController@show');
Route::post('materias_cursadas', 'MateriaCursadaController@store');
Route::delete('materias_cursadas', 'MateriaCursadaController@delete');

//Proyecciones
Route::get('proyecciones', 'ProyeccionController@index');
Route::get('proyecciones/{proyeccion}', 'ProyeccionController@show');
