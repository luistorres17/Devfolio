@extends('layouts.installer') {{-- antes usaba layouts.app --}}

@section('content')
<div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded-lg shadow">
    <h2 class="text-2xl font-bold mb-4">Paso 1: Configuración de la Base de Datos</h2>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 p-3 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('install.submitStep1') }}">
        @csrf

        <div class="mb-4">
            <label class="block font-semibold">Host</label>
            <input type="text" name="db_host" class="w-full border rounded px-3 py-2" value="{{ old('db_host', '127.0.0.1') }}" required>
        </div>

        <div class="mb-4">
            <label class="block font-semibold">Puerto</label>
            <input type="text" name="db_port" class="w-full border rounded px-3 py-2" value="{{ old('db_port', '3306') }}" required>
        </div>

        <div class="mb-4">
            <label class="block font-semibold">Nombre de la Base de Datos</label>
            <input type="text" name="db_database" class="w-full border rounded px-3 py-2" value="{{ old('db_database') }}" required>
        </div>

        <div class="mb-4">
            <label class="block font-semibold">Usuario</label>
            <input type="text" name="db_username" class="w-full border rounded px-3 py-2" value="{{ old('db_username') }}" required>
        </div>

        <div class="mb-4">
            <label class="block font-semibold">Contraseña</label>
            <input type="password" name="db_password" class="w-full border rounded px-3 py-2">
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Continuar al Paso 2
        </button>
    </form>
</div>
@endsection