@extends('layout')

@section('content')
<div class="container mt-4">
    <h4>Tareas pendientes</h4>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Id Tarea</th>
                <th>Proyecto</th>
                <th>Tarea</th>
                <th>Descripción</th>
                <th>% Avance</th>
                <th>Estatus</th>
                <th>Fecha límite</th>
                <th>Comentarios</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tareas as $t)
                <tr>
                    <td>{{ $t->IdTask }}</td>
                    <td>{{ $t->Project }}</td>
                    <td>{{ $t->Task }}</td>
                    <td>{{ $t->Description }}</td>
                    <td>{{ $t->Progress }}</td>
                    <td>{{ ucfirst($t->Status) }}</td>
                    <td>{{ $t->DueDate }}</td>
                    <td>{{ $t->Comments }}</td>
                    <td>
                        <a href="{{ route('tareas.editar', $t->IdTask) }}" class="btn btn-sm btn-warning">Editar</a>
                        <a href="{{ route('tareas.finalizar', $t->IdTask) }}" class="btn btn-sm btn-success">Finalizar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection