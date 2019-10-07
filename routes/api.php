<?php

use Illuminate\Http\Request;

// Alumnos
// Route::post('alumnos', 'AlumnoController@store');
Route::get('alumnos', 'AlumnoController@index');
Route::get('alumnos/{alumno}', 'AlumnoController@show');
Route::put('alumnos/{alumno}', 'AlumnoController@update');
Route::get('secciones/{seccion}/alumnos', 'AlumnoController@showFromSeccion');
Route::get('alumnos/{alumno}/creditos', 'AlumnoController@credits');

// Trabajadores
Route::get('trabajadores', 'TrabajadorController@index');
Route::get('trabajadores/{trabajador}', 'TrabajadorController@show');
Route::put('trabajadores/{trabajador}', 'TrabajadorController@update');

// Secciones
Route::get('secciones', 'SeccionController@index');
Route::get('secciones/{seccion}', 'SeccionController@show');
Route::get('trabajadores/{trabajador}/secciones', 'SeccionController@showFromTrabajador');
Route::put('secciones/{seccion}', 'SeccionController@update');

//Materias
Route::get('materias', 'MateriaController@index');
Route::get('materias/{materia}', 'MateriaController@show');
Route::get('alumnos/{alumno}/materias_cursadas', 'MateriaCursadaController@showFromAlumno');
Route::get('proyecciones/materias_disponibles/{matricula}', 'MateriaController@proyeccion');

//Materias cursadas
Route::get('materias_cursadas', 'MateriaCursadaController@index');
Route::get('materias_cursadas/marcada', 'MateriaCursadaController@show');
Route::post('materias_cursadas', 'MateriaCursadaController@store');
Route::delete('materias_cursadas', 'MateriaCursadaController@delete');

//Materias proyeccion
Route::get('materias_proyecciones', 'MateriaProyeccionController@index');
Route::post('materias_proyecciones', 'MateriaProyeccionController@store');

//Proyecciones
Route::get('proyecciones', 'ProyeccionController@index');
Route::get('proyecciones/{proyeccion}', 'ProyeccionController@show');
Route::post('proyecciones', 'ProyeccionController@store');

//Avances
Route::get('avances', 'AvanceController@index');
Route::post('avances', 'AvanceController@store');
