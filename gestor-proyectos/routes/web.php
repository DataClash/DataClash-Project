<?php

use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\TareaController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::get('/proyectos', [ProyectoController::class, 'index'])->name('proyectos.index');
Route::get('/tareas', [TareaController::class, 'index'])->name('tareas.index');
Route::get('/tareas/form', [TareaController::class, 'create'])->name('tareas.create');
Route::post('/tareas', [TareaController::class, 'store'])->name('tareas.store');
Route::get('/tareas/pendientes', [TareaController::class, 'pendientes'])->name('tareas.pendientes');
Route::get('/tareas/{id}/editar', [TareaController::class, 'editar'])->name('tareas.editar');
Route::put('/tareas/{id}/actualizar', [TareaController::class, 'actualizar'])->name('tareas.actualizar');
Route::get('/tareas/{id}/finalizar', [TareaController::class, 'formFinalizar'])->name('tareas.formFinalizar');
Route::post('/tareas/{id}/finalizar', [TareaController::class, 'finalizar'])->name('tareas.finalizar');