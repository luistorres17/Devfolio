<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Landing Page') }}
        </h2>
    </x-slot>
    <div class="py-12">
        @if($hero)
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">Nombre</th>
                                <th scope="col" class="px-6 py-3">Mensaje de bienvenida</th>
                                <th scope="col" class="px-6 py-3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    @if($hero)
                                        {{ $hero->user_name }}
                                    @else
                                        no se ha registado aún
                                    @endif
                                </th>
                                <td class="px-6 py-4">
                                    @if($hero)
                                        {{ $hero->welcome_text }}
                                    @else
                                        no se ha registado aún
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    @if($hero)
                                        <form action="{{ route('landingpage.herodestroy', $hero->id) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar este registro?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Eliminar</button>
                                        </form>

                                        <button data-modal-target="modal-{{ $hero->id }}" data-modal-toggle="modal-{{ $hero->id }}"
                                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                            Editar
                                        </button>
                                        <!-- Main modal -->
                                        <div id="modal-{{ $hero->id }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                            <div class="relative p-4 w-full max-w-2xl max-h-full">
                                                <!-- Modal content -->
                                                <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                                                    <!-- Modal header -->
                                                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                            Actualizar mensaje de bienvenida 
                                                        </h3>
                                                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="modal-{{ $hero->id }}">
                                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                            </svg>
                                                            <span class="sr-only">Close modal</span>
                                                        </button>
                                                    </div>
                                                    <!-- Modal body -->
                                                    <div class="p-4 md:p-5 space-y-4">
                                                        <form action="{{ route('landingpage.heroupdate', $hero->id) }}" method="POST" class="max-w-md mx-auto grid grid-cols-3 gap-4">
                                                            @csrf
                                                            @method('PATCH')
                                                            <div class="mb-5 col-span-3">
                                                                <label for="user_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-dark">Usuario:</label>
                                                                <input id="user_id" type="text" name="user_id" value="{{ $user->id }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" readonly>
                                                            </div>
                                                            <div class="mb-5 col-span-2">
                                                                <label for="welcome_text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-dark">Mensaje de bienvenida:</label>
                                                                <input id="welcome_text" type="text" name="welcome_text" value="{{ $hero->welcome_text }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Mensaje de bienvenida">
                                                            </div>
                                                            <div class="mb-5 col-span-3">
                                                                <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded">Enviar</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                        
                                                    <!-- Modal footer -->
                                                    <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                            
                                                        <button data-modal-hide="modal-{{ $hero->id }}"type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Cerrar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                         
                                    @else
                                        no se ha registado aún
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        @else
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <form action="{{ route('landingpage.herostore') }}" method="POST" class="max-w-md mx-auto grid grid-cols-3 gap-4">
                        @csrf
                        <div class="mb-5 col-span-3">
                            <label for="user_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-dark">Usuario:</label>
                            <input id="user_id" type="text" name="user_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" readonly value="{{ $user->id }}">
                        </div>
                        <div class="mb-5 col-span-2">
                            <label for="welcome_text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-dark">Mensaje de bienvenida:</label>
                            <input id="welcome_text" type="text" name="welcome_text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Mensaje de bienvenida">
                        </div>
                        <div class="mb-5 col-span-3">
                            <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
            
        @endif
    </div>
</x-app-layout>