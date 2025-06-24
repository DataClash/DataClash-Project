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
// Route::get('/tareas/livewire', function () {
//     return view('tareas.form'); // Asegúrate que coincida con el archivo que usas
// });