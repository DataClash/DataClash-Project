@extends('layout')

@section('content')
<div class="container mt-4">
    <h3 class="mb-4">Bienvenido al Gestor de Proyectos</h3>

    <div class="row g-4">
        <div class="col-md-4">
            <div class="card border-primary shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Total de Proyectos</h5>
                    <p class="card-text display-5">{{ $totalProyectos }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-warning shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Tareas Pendientes</h5>
                    <p class="card-text display-5">{{ $tareasPendientes }}</p>
                    <a href="{{ route('tareas.pendientes') }}" class="btn btn-warning btn-sm">Ver tareas</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-success shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Tareas Finalizadas</h5>
                    <p class="card-text display-5">{{ $tareasFinalizadas }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection