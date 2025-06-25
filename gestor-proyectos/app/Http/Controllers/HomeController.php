<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $totalProyectos = DB::table('DB_PROJECT_V_TASKS')->distinct('Project')->count('Project');
        $tareasPendientes = DB::table('DB_PROJECT_V_TASKS')->where('Progress', '<', 1)->count();
        $tareasFinalizadas = DB::table('DB_PROJECT_V_TASKS')->where('Progress', '=', 1)->count();

        return view('home', compact('totalProyectos', 'tareasPendientes', 'tareasFinalizadas'));
    }
}