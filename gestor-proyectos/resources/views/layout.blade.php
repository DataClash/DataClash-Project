<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Gestor de Proyectos | Neural Traveler</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        {{-- Bootstrap 5 CDN --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

        @livewireStyles
    </head>
    <body>

        {{-- Navbar --}}
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">🧠 Gestor de Proyectos</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuNav">
            <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="menuNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <!-- Tareas -->
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Tareas</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('tareas.create') }}">Crear tarea</a></li>
                    <li><a class="dropdown-item" href="{{ route('tareas.pendientes') }}">Tareas pendientes</a></li>
                    <li><a class="dropdown-item" href="{{ route('tareas.index') }}">Todas las tareas</a></li>
                </ul>
                </li>

                <!-- Dashboard -->
                <li class="nav-item">
                </li>
            </ul>
            </div>
        </div>
        </nav>

        {{-- Contenido dinámico --}}
        <main class="container mt-4">
            @yield('content')
        </main>

        {{-- Footer --}}
        <footer class="bg-light text-center py-3 mt-5">
            <small>&copy; {{ date('Y') }} Data Clash — Todos los derechos reservados.</small>
        </footer>

        {{-- Scripts --}}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        @livewireScripts
    </body>
</html>