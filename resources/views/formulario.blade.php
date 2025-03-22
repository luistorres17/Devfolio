@extends('layouts.app')

@section('content')
    <div class="max-w-lg mx-auto mt-10 p-6 bg-white rounded-lg shadow">
        <h2 class="text-xl font-bold mb-4">Formulario</h2>
        <form action="{{ route('formulario.enviar') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700">Nombre:</label>
                <input type="text" name="nombre" class="w-full px-4 py-2 border rounded">
            </div>
            <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded">Enviar</button>
        </form>
    </div>
@endsection
