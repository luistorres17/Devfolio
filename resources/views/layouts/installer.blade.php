<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Instalación del Sistema</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css') {{-- Usa esto si estás con Vite --}}
</head>
<body class="bg-gray-100 text-gray-800 min-h-screen flex items-center justify-center">
    <main class="w-full max-w-lg p-6 bg-white rounded shadow-md">
        @yield('content')
    </main>
</body>
</html>
