<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('About me') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            
                <div class="p-6 text-gray-900 ">
                    <!-- llamamos al formulario de about -->
                    @if($formabouts)
                        <p></p>
                    @else
                    <form action="{{ route('FormAbout.store') }}" method="POST" class="max-w-md mx-auto grid grid-cols-3 gap-4">
                        @csrf
                        <div class="mb-5 col-span-3">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-dark">Nombre:</label>
                            <input id="name" type="text" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nombre">
                        </div>
                        <div class="mb-5 col-span-2">
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-dark">Email:</label>
                            <input id="email" type="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="email">
                        </div>
                        <div class="mb-5 col-span-2">
                            <label class="block text-gray-700">Telefono:</label>
                            <input type="tel" name="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="numero">
                        </div>
                        <div class="mb-5 col-span-4" >
                            <label class="block text-gray-700">Descripcion:</label>
                            <textarea name="descripcion" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Descripcion"></textarea >
                        </div>
                        <div class="mb-5 col-span-4">
                            <label class="block text-gray-700">Experiencia:</label>
                            <textarea name="experiencia" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Experiencia"></textarea>
                        </div>
                        <div class="mb-5 col-span-3">
                            <label class="block text-gray-700">Github:</label>
                            <input type="text" name="github" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Github">
                        </div>
                        <div class="mb-5 col-span-1">
                            <label class="block text-gray-700">Linkedin:</label>
                            <input type="text" name="linkedin" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="linkedin">
                        </div>
                        <div class="mb-5 col-span-1">
                            <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded">Enviar</button>
                        </div>
                    </form>
                    @endif
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    @if($formabouts)
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">Nombre</th>
                                        <th scope="col" class="px-6 py-3">Email</th>
                                        <th scope="col" class="px-6 py-3">Telefono</th>
                                        <th scope="col" class="px-6 py-3">Descripcion</th>
                                        <th scope="col" class="px-6 py-3">Experiencia</th>
                                        <th scope="col" class="px-6 py-3">Github</th>
                                        <th scope="col" class="px-6 py-3">Linkedin</th>
                                        <th scope="col" class="px-6 py-3"> Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                        <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $formabouts->name }}</th>
                                            <td class="px-6 py-4">{{ $formabouts->email }}</td>
                                            <td class="px-6 py-4">{{ $formabouts->phone }}</td>
                                            <td class="px-6 py-4">{{ $formabouts->descripcion }}</td>
                                            <td class="px-6 py-4">{{ $formabouts->experiencia }}</td>
                                            <td class="px-6 py-4">{{ $formabouts->github }}</td>
                                            <td class="px-6 py-4">{{ $formabouts->linkedin }}</td>
                                            <td class="px-6 py-4">
                                                <form action="{{ route('FormAbout.destroy', $formabouts->id) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar este registro?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Eliminar</button>
                                                </form>
                                            </td>
                                        </tr>
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p></p>
                    @endif
                </div>
            
        </div>
    </div>
</x-app-layout>
