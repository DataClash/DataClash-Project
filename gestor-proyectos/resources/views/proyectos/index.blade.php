@extends('layout')

@section('content')
    <h2 class="mb-4">Proyectos activos</h2>

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        @forelse ($proyectos as $p)
            <div class="col">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="card-title">{{ $p->DESC_PROJECT }}</h5>
                        <p class="card-text">
                            <strong>Estado:</strong> {{ $p->DESC_STATUS }}<br>
                            <strong>Inicio:</strong> {{ $p->CREATE_DATE }}<br>
                            <strong>Descripción:</strong> {{ $p->DESCRIPTION }}
                        </p>
                    </div>
                    <div class="card-footer text-end">
                        <button class="btn btn-outline-primary btn-sm">Ver detalles</button>
                    </div>
                </div>
            </div>
        @empty
            <div class="col">
                <div class="alert alert-info">
                    No hay proyectos registrados.
                </div>
            </div>
        @endforelse
    </div>
@endsection