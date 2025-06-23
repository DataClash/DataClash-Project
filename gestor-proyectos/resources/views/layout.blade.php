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
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="/">🧠 Neural Projects</a>
                <div>
                    <a class="nav-link text-white" href="/proyectos">Proyectos</a>
                    <a class="nav-link text-white" href="/tareas">Tareas</a>
                </div>
            </div>
        </nav>

        {{-- Contenido dinámico --}}
        <main class="container mt-4">
            @yield('content')
        </main>

        {{-- Footer --}}
        <footer class="bg-light text-center py-3 mt-5">
            <small>&copy; {{ date('Y') }} Neural Traveler — Todos los derechos reservados.</small>
        </footer>

        {{-- Scripts --}}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        @livewireScripts
    </body>
</html>