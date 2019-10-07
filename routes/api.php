<?php

use Illuminate\Http\Request;

// Alumnos
// Route::post('alumnos', 'AlumnoController@store');
Route::get('alumnos', 'AlumnoController@index');
Route::get('alumnos/{alumno}', 'AlumnoController@show');
Route::put('alumnos/{alumno}', 'AlumnoController@update');
Route::get('secciones/{seccion}/alumnos', 'AlumnoController@showFromSeccion');

// Trabajadores
Route::get('trabajadores', 'TrabajadorController@index');
Route::get('trabajadores/{trabajador}', 'TrabajadorController@show');

// Secciones
Route::get('secciones', 'SeccionController@index');
Route::get('secciones/{seccion}', 'SeccionController@show');
Route::get('trabajadores/{trabajador}/secciones', 'SeccionController@showFromTrabajador');

//Materias
Route::get('materias', 'MateriaController@index');
Route::get('materias/{materia}', 'MateriaController@show');
Route::get('alumnos/{alumno}/materias_cursadas', 'MateriaCursadaController@showFromAlumno');
Route::get('proyecciones/materias_disponibles/{matricula}', 'MateriaController@proyeccion');
// todo: Materias marcadas en la proyeccion

//Materias cursadas
Route::get('materias_cursadas', 'MateriaCursadaController@index');
Route::get('materias_cursadas/marcada', 'MateriaCursadaController@show');
Route::post('materias_cursadas', 'MateriaCursadaController@store');
Route::delete('materias_cursadas', 'MateriaCursadaController@delete');

//Proyecciones
Route::get('proyecciones', 'ProyeccionController@index');
Route::get('proyecciones/{proyeccion}', 'ProyeccionController@show');
