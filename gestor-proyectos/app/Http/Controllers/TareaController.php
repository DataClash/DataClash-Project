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
        // $idProyecto = $request->input('id_proyecto') === 'nuevo' ? 0 : $request->input('id_proyecto');
        // $nombreProyecto = $request->input('proyecto'); // Si es nuevo, aquí vendrá el nombre

        // Ahora llama al Stored Procedure como ya lo haces
        DB::statement("CALL DB_PROJECT_SP_CREATETASK(?, ?, ?, ?, ?, ?, ?)", [
            $request->input('id_proyecto'),
            $request->input('proyecto'),
            $request->input('tarea'),
            $request->input('descripcion'),
            $request->input('fecha_inicio'),
            $request->input('fecha_fin'),
            $request->input('comentarios')
        ]);

        return redirect()->back()->with('success', 'Tarea guardada correctamente.');
    }

    public function create()
    {
        $proyectos = DB::select("
        SELECT DISTINCT CONCAT (LPAD(ID_TASK, 3, '0'), ' * ', DESC_PROJECT, ' * ', DESC_TASK) AS PROJECT
        FROM DB_PROJECT_TTASK
        ORDER BY 1
        ");

        return view('tareas.form-index', compact('proyectos'));
    }
}