@extends('layouts.installer') {{-- antes usaba layouts.app --}}

@section('content')
<div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded-lg shadow">
    <h2 class="text-2xl font-bold mb-4">Paso 2: Migración de la Base de Datos</h2>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 p-3 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <p class="mb-4">Los datos de conexión han sido guardados correctamente. Este paso ejecutará las migraciones necesarias.</p>

    <form method="POST" action="{{ route('install.submitStep2') }}">
        @csrf

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
            Ejecutar Migraciones y Continuar al Paso 3
        </button>
    </form>
</div>
@endsection