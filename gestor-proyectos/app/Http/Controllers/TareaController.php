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

    public function pendientes()
    {
        $tareas = DB::select("
            SELECT IdTask, Project, Task, Description, Progress, Status, DueDate, Comments
            FROM DB_PROJECT_V_TASKS
            WHERE Progress < 1;
        ");

        return view('tareas.pendientes', compact('tareas'));
    }

    public function editar($id)
    {
        $tarea = DB::selectOne("SELECT * FROM DB_PROJECT_V_TASKS WHERE IdTask = ?", [$id]);
        return view('tareas.editar', compact('tarea'));
    }

    public function actualizar(Request $request, $id)
    {
        $porcentaje = $request->input('porcentaje');
        $estado = $request->input('estado');
        $due_date = $request->input('due_date') ?: null;
        $end_date = $request->input('end_date') ?: null;
        $comentarios = $request->input('comentarios') ?: null;

        DB::statement("CALL DB_PROJECT_SP_UPDATETASK(?, ?, ?, ?, ?)", [
            $id,
            $porcentaje,
            $estado,
            $due_date,
            $comentarios
        ]);

        return redirect()->route('tareas.pendientes')->with('success', 'Tarea actualizada correctamente.');
    }

    public function formFinalizar($id)
    {
        $tarea = DB::selectOne("SELECT * FROM DB_PROJECT_V_TASKS WHERE IdTask = ?", [$id]);
        return view('tareas.finalizar', compact('tarea'));
    }

    public function finalizar(Request $request, $id)
    {
        $endDate = $request->input('end_date');
        $comentarios = $request->input('comentarios');

        DB::statement("CALL DB_PROJECT_SP_ENDTASK(?, ?, ?)", [
            $id,
            $endDate,
            $comentarios
        ]);

        return redirect()->route('tareas.pendientes')->with('success', 'Tarea finalizada correctamente.');
    }

}