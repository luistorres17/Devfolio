<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('img hero') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 text-gray-900">
                <form action="{{ route('imghero.store') }}" method="POST" enctype="multipart/form-data" class="max-w-md mx-auto grid grid-cols-3 gap-4">
                    @csrf
    
                    <div class="mb-5 col-span-3">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nombre:</label>
                        <input id="name" type="text" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Nombre" required>
                    </div>
    
                    <div class="mb-5 col-span-2">
                        <label for="path" class="block text-sm font-medium text-gray-900 mb-2">Imagen (.webp solamente):</label>
                        <input id="path" type="file" name="path" accept=".webp" required
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <p class="text-sm text-gray-500 mt-1">Solo se permiten imágenes en formato <strong>.webp</strong>.</p>
                        @error('path')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
    
                    <div class="mb-5 col-span-1">
                        <label for="alt" class="block mb-2 text-sm font-medium text-gray-900">Alt:</label>
                        <input id="alt" type="text" name="alt" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Texto alternativo">
                    </div>
    
                    <div class="mb-5 col-span-4">
                        <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600 transition">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    

    <div class="py-12">
        @if($imgs)
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">Nombre</th>
                                <th scope="col" class="px-6 py-3">Path</th>
                                <th scope="col" class="px-6 py-3">alt</th>
                                <th scope="col" class="px-6 py-3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($imgs as $img)                  
                                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $img->name }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $img->path }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $img->alt }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <form action="{{ route('imghero.destroy', $img->id) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar este registro?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @else
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <p> sin datos en la tabla de la db</p>
                </div>
            </div>
        @endif
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <div class="grid grid-cols-2 md:grid-cols-3 gap-4" >
                    @foreach ($imgs as $img)
                        <div>
                            <img src="{{ asset('storage/landing/' . $img->path) }}" alt="{{$img -> alt}}" class="h-auto max-w-full rounded-lg" loading="lazy" decoding = "sync" title = "{{ $img->name }}">
                        </div>
                    @endforeach
                </div>
                
    </div>


    

    
    

    

</x-app-layout>