<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TareaController extends Controller
{
    public function formIndex()
    {
        return view('tareas.form-index');
    }

    public function store(Request $request)
    {
        DB::statement('CALL DB_PROJECT_SP_CREATETASK(?, ?, ?, ?, ?, ?, ?)', [
            $request->id_proyecto,         // ID_PROJECT
            $request->proyecto,            // PROJECT_NAME
            $request->nombre,              // TASK_NAME
            $request->descripcion,         // DESC_NAME
            $request->fecha_inicio,        // CREATE_DATE
            $request->fecha_fin,           // DUE_DATE
            $request->comentarios          // COMMENTS
        ]);

        return redirect()->route('tareas.form')->with('success', 'Tarea registrada correctamente.');
    }
}