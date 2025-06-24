@extends('layout')

@section('content')
<div class="container mt-4">
    <h4>Finalizar Tarea: {{ $tarea->Task }}</h4>

    <form action="{{ route('tareas.finalizar', $tarea->IdTask) }}" method="POST" class="border p-4 bg-light rounded shadow-sm">
        @csrf

        <div class="mb-3">
            <label class="form-label">Fecha de finalización</label>
            <input type="date-local" name="end_date" class="form-control" required
                value="{{ today()->format('Y-m-d') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Comentarios finales</label>
            <textarea name="comentarios" class="form-control" rows="3" placeholder="Observaciones o cierre de tarea"></textarea>
        </div>

        <button class="btn btn-success" type="submit">Finalizar tarea</button>
    </form>
</div>
@endsection