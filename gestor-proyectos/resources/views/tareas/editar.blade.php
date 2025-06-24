@extends('layout')

@section('content')
<div class="container mt-4">
    <h4>Editar Tarea: {{ $tarea->Task }}</h4>

    <form action="{{ route('tareas.actualizar', $tarea->IdTask) }}" method="POST" class="border p-4 bg-light rounded shadow-sm">
        @csrf
        @method('PUT')

        {{-- Porcentaje --}}
        <div class="mb-3">
            <label class="form-label">% de Avance</label>
            <input type="decimal" name="porcentaje" class="form-control" value="{{ $tarea->Progress }}" min="0" max="100">
        </div>

        {{-- Estado --}}
        <div class="mb-3">
            <label class="form-label">Estado</label>
            <select name="estado" class="form-select" required>
                <option value="PENDIENTE" {{ $tarea->Status == 'PENDIENTE' ? 'selected' : '' }}>PENDIENTE</option>
                <option value="INICIO" {{ $tarea->Status == 'INICIO' ? 'selected' : '' }}>INICIO</option>
                <option value="ANALISIS" {{ $tarea->Status == 'ANALISIS' ? 'selected' : '' }}>ANÁLISIS</option>
                <option value="DISENO" {{ $tarea->Status == 'DISENO' ? 'selected' : '' }}>DISEÑO</option>
                <option value="DESARROLLO" {{ $tarea->Status == 'DESARROLLO' ? 'selected' : '' }}>DESARROLLO</option>
                <option value="PRUEBAS" {{ $tarea->Status == 'PRUEBAS' ? 'selected' : '' }}>PRUEBAS</option>
                <option value="PRODUCCION" {{ $tarea->Status == 'PRODUCCION' ? 'selected' : '' }}>PRODUCCION</option>
                <option value="FINALIZADO" {{ $tarea->Status == 'FINALIZADO' ? 'selected' : '' }}>FINALIZADO</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Fecha de entrega (Due Date)</label>
            <input type="datetime-local" name="due_date" class="form-control"
                value="{{ $tarea->DueDate ? \Carbon\Carbon::parse($tarea->DueDate)->format('Y-m-d\TH:i') : '' }}">
        </div>

        {{-- COMMENTS --}}
        <div class="mb-3">
            <label for="comentarios" class="form-label">Comentarios</label>
            <textarea name="comentarios" id="comentarios" class="form-control" rows="3"> {{ $tarea->Comments }}
            </textarea>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection