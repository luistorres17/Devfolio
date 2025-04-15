@extends('layouts.installer') {{-- antes usaba layouts.app --}}

@section('content')
    <h1 class="text-2xl font-bold mb-6 text-center">Configuración de Base de Datos</h1>

    @if ($errors->any())
        <div class="mb-4 text-red-600">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="text-sm">• {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('install.submitStep1') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="db_host" class="block font-medium text-gray-700">DB Host</label>
            <input type="text" id="db_host" name="db_host" class="w-full mt-1 p-2 border rounded" value="127.0.0.1" required>
        </div>

        <div class="mb-4">
            <label for="db_port" class="block font-medium text-gray-700">DB Puerto</label>
            <input type="text" id="db_port" name="db_port" class="w-full mt-1 p-2 border rounded" value="3306" required>
        </div>

        <div class="mb-4">
            <label for="db_database" class="block font-medium text-gray-700">Nombre de la base de datos</label>
            <input type="text" id="db_database" name="db_database" class="w-full mt-1 p-2 border rounded" required>
        </div>

        <div class="mb-4">
            <label for="db_username" class="block font-medium text-gray-700">Usuario</label>
            <input type="text" id="db_username" name="db_username" class="w-full mt-1 p-2 border rounded" required>
        </div>

        <div class="mb-4">
            <label for="db_password" class="block font-medium text-gray-700">Contraseña</label>
            <input type="password" id="db_password" name="db_password" class="w-full mt-1 p-2 border rounded">
        </div>

        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Instalar
        </button>
    </form>
@endsection
