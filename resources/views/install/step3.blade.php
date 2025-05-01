@extends('layouts.installer')

@section('title', 'Paso 3')

@section('content')
<div class="bg-white p-8 rounded shadow-md">
    <h1 class="text-2xl font-bold mb-6 text-center">Crear Usuario Administrador</h1>

    @if ($errors->any())
        <div class="mb-4 text-red-600">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="text-sm">• {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('install.submitStep3') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="name" class="block font-medium">Nombre</label>
            <input type="text" name="name" id="name" class="w-full border mt-1 p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label for="email" class="block font-medium">Correo Electrónico</label>
            <input type="email" name="email" id="email" class="w-full border mt-1 p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label for="password" class="block font-medium">Contraseña</label>
            <input type="password" name="password" id="password" class="w-full border mt-1 p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label for="password_confirmation" class="block font-medium">Confirmar Contraseña</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="w-full border mt-1 p-2 rounded" required>
        </div>

        <button type="submit" class="w-full bg-blue-600 text-white font-semibold py-2 px-4 rounded hover:bg-blue-700">
            Finalizar Instalación
        </button>
    </form>
</div>
@endsection
