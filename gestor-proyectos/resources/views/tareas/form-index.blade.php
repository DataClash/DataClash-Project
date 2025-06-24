@extends('layout')

@section('content')
<div class="row">
    <div class="col-md-6">
        <h4>Nueva Tarea</h4>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('tareas.store') }}" method="POST" class="border p-3 rounded bg-light">
            @csrf

            {{-- Proyecto existente o nuevo --}}
            <div class="mb-3">
                <label for="help_proyecto" class="form-label">Proyecto</label>
                <select id="help_proyecto" name="help_proyecto" class="form-select" onchange="toggleNuevoProyecto(this)">
                    <option value="">-- Selecciona un proyecto --</option>
                    @foreach($proyectos as $p)
                        <option value="{{ $p->PROJECT }}">{{ $p->PROJECT }}</option>
                    @endforeach
                </select>
            </div>

            {{-- ID_PROJECT --}}
            <div class="mb-3">
                <label for="id_proyecto" class="form-label">ID del Proyecto antecesor</label>
                <input type="text" name="id_proyecto" id="id_proyecto" class="form-control" placeholder="Escribe el id del proyecto" required>
            </div>

            {{-- PROJECT_NAME --}}
            <div class="mb-3">
                <label for="proyecto" class="form-label">Nombre del Proyecto</label>
                <input type="text" name="proyecto" id="proyecto" class="form-control" placeholder="Escribe o selecciona un proyecto" required>
            </div>

            {{-- TASK_NAME --}}
            <div class="mb-3">
                <label for="tarea" class="form-label">Nombre de la Tarea</label>
                <input type="text" name="tarea" id="tarea" class="form-control" required>
            </div>

            {{-- DESC_NAME --}}
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea name="descripcion" id="descripcion" class="form-control" rows="3"></textarea>
            </div>

            {{-- CREATE_DATE --}}
            <div class="mb-3">
                <label for="fecha_inicio" class="form-label">Fecha de Inicio</label>
                <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control">
            </div>

            {{-- DUE_DATE --}}
            <div class="mb-3">
                <label for="fecha_fin" class="form-label">Fecha de Finalización</label>
                <input type="datetime-local" name="fecha_fin" id="fecha_fin" class="form-control">
            </div>

            {{-- COMMENTS --}}
            <div class="mb-3">
                <label for="comentarios" class="form-label">Comentarios</label>
                <textarea name="comentarios" id="comentarios" class="form-control" rows="2"></textarea>
            </div>

            <button type="submit" class="btn btn-success">Guardar Tarea</button>
        </form>
    </div>
</div>
@endsection

<script>
function toggleNuevoProyecto(select) {
    const nuevoProyectoDiv = document.getElementById('nuevoProyectoDiv');
    const proyectoInput = document.getElementById('proyecto');

    if (select.value === 'nuevo') {
        nuevoProyectoDiv.style.display = 'block';
        proyectoInput.required = true;
    } else {
        nuevoProyectoDiv.style.display = 'none';
        proyectoInput.required = false;
    }
}
</script>