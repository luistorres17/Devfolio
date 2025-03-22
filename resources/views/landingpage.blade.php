<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Landing Page') }}
        </h2>
    </x-slot>
    <div class="max-w-2xl mx-auto bg-white p-6 shadow-lg rounded-lg">
    <h2 class="text-2xl font-semibold mb-4">Subir Imagen</h2>

    @if(session('success'))
        <div class="bg-green-200 text-green-700 p-3 rounded-md mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('landingpage.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        <div>
            <label for="name" class="block font-medium text-gray-700">Nombre:</label>
            <input type="text" id="name" name="name" required
                class="w-full border border-gray-300 p-2 rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none">
        </div>

        <div>
            <label for="path" class="block font-medium text-gray-700">Seleccionar Imagen:</label>
            <input type="file" id="path" name="path" required
                class="w-full border border-gray-300 p-2 rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none">
        </div>

        <button type="submit"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg">
            Guardar Imagen
        </button>
    </form>

    <h3 class="text-xl font-semibold mt-6">Imágenes Guardadas</h3>
    <div class="grid grid-cols-3 gap-4 mt-4">
        @foreach ($imgs as $img)
            <div class="border rounded-lg p-2">
                <img src="{{ asset('storage/landing/' . $img->path) }}" alt="{{ $img->name }}" class="w-full h-32 object-cover rounded-md">
                <p class="text-center text-gray-700 mt-2">{{ $img->name }}</p>
            </div>
            <div class="flex justify-center mt-4">
                <form action="{{ route('landingpage.destroy', $img->id) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar esta imagen?');" >
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Eliminar</button>
                </form>
            </div>
        @endforeach
    </div>
</div>
</x-app-layout>