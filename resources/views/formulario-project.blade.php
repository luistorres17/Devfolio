<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Projects') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
                <div class="p-6 text-gray-900 ">
                    <form action="{{ route('FormProject.store') }}" method="POST" enctype="multipart/form-data" class="max-w-md mx-auto grid grid-cols-3 gap-4">
                        @csrf
                        <div class="mb-5 col-span-3">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nombre:</label>
                            <input id="name" type="text" name="nameProject" required
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        </div>
                        <div class="mb-5 col-span-2">
                            <label for="descripcion" class="block mb-2 text-sm font-medium text-gray-900">Descripción:</label>
                            <input id="descripcion" type="text" name="descripcion"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        </div>
                        <div class="mb-5 col-span-2">
                            <label for="link_url" class="block mb-2 text-sm font-medium text-gray-900">Link URL:</label>
                            <input id="link_url" type="url" name="link_url"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        </div>
                        <div class="mb-5 col-span-4">
                            <label class="block text-gray-700">Imagen:</label>
                            <input type="file" name="image"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        </div>
                        <div class="relative max-w-sm">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                </svg>
                            </div>
                            <input datepicker datepicker-format="yyyy-mm-dd" id="fecha_realizacion" type="text" name="fecha_realizacion" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Seleccione una fecha" required>
                        </div>
                        <div class="mb-5 col-span-4">
                            <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded">Enviar</button>
                        </div>
                    </form>
                </div>
                <div class="p-6 text-gray-900 ">
                    <div class="grid grid-cols-4 gap-4">
                        @foreach ($formprojects as $project)
                            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
                                <a>
                                    <img class="rounded-t-lg w-full h-48 object-cover" 
                                        src="{{ $project->image ? asset('storage/' . $project->image) : asset('images/default.png') }}" 
                                        alt="{{ $project->nameProject }}" />
                                </a>
                                <div class="p-5">
                                    <a>
                                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                            {{ $project->nameProject }}
                                        </h5>
                                    </a>
                                    <a>
                                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                            {{ $project->fecha_realizacion }}
                                        </h5>
                                    </a>
                                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                        {{ $project->descripcion }}
                                    </p>
                                    <a href="{{ $project->link_url }}" 
                                        target="_blank" 
                                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            Ver Proyecto
                                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                            </svg>
                                    </a>
                                </div>
                                <div class="p-5">
                                    <form action="{{ route('FormProject.destroy', $project->id) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar este registro?');" >
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Eliminar</button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            
        </div>
    </div>
</x-app-layout>
