<?php

// use Illuminate\Support\Facades\DB;

// Route::get('/probar-bd', function () {
//     try {
//         $resultados = DB::select('SELECT * FROM DB_PROJECT_TTASK LIMIT 5');
//         return dd($resultados);
//     } catch (\Exception $e) {
//         return 'Error de conexión: ' . $e->getMessage();
//     }
// });

use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\TareaController;

Route::get('/proyectos', [ProyectoController::class, 'index'])->name('proyectos.index');
Route::get('/tareas', [TareaController::class, 'index'])->name('tareas.index');
Route::get('/tareas/form', [TareaController::class, 'create'])->name('tareas.create');
Route::post('/tareas', [TareaController::class, 'store'])->name('tareas.store');
Route::get('/tareas/pendientes', [TareaController::class, 'pendientes'])->name('tareas.pendientes');
Route::get('/tareas/{id}/editar', [TareaController::class, 'editar'])->name('tareas.editar');
Route::put('/tareas/{id}/actualizar', [TareaController::class, 'actualizar'])->name('tareas.actualizar');
Route::get('/tareas/{id}/finalizar', [TareaController::class, 'formFinalizar'])->name('tareas.formFinalizar');
Route::post('/tareas/{id}/finalizar', [TareaController::class, 'finalizar'])->name('tareas.finalizar');