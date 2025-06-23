<?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;

// class ProyectoController extends Controller
// {
//     //
// }


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProyectoController extends Controller
{
    public function formIndex()
    {
        return view('tareas.form-index');
    }
}