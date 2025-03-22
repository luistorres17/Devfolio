<x-app-layout>
    <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Contact') }}
            </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 text-gray-900 ">

            @foreach ($contactpublics_backend as $contact )
                <ul class="max-w-md divide-y divide-gray-200 dark:divide-gray-700">
                    <li class="pb-3 sm:pb-4">
                        <div class="flex items-center space-x-4 rtl:space-x-reverse">
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                    {{ $contact->name }}
                                </p>
                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                    {{ $contact->email }}
                                </p>
                                @if($contact->status == 'pendiente')
                                    <div class="mt-1 flex items-center gap-x-1.5">
                                        <div class="flex-none rounded-full bg-red-500/20 p-1">
                                            <div class="size-3 rounded-full bg-red-500"></div>
                                        </div>
                                        <p class="text-xs/5 text-gray-500">No leído</p>
                                    </div>
                                @else
                                    <p class="mt-1 text-xs/5 text-gray-500">Visto</p>
                                @endif
                            </div>

                            <!-- boton para eliminar el mensaje -->
                            <div class="flex items-center gap-x-1.5">
                                <form action="{{ route('contacto.publicdelete', $contact->id) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar este registro?');" >
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Eliminar</button>
                                </form>
                            </div>
                            
                            <!-- Botón que abre el modal -->
                            <div>
                                <button data-modal-target="modal-{{ $contact->id }}" data-modal-toggle="modal-{{ $contact->id }}" 
                                    class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 
                                    font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 
                                    dark:focus:ring-blue-800" type="button">
                                    Ver mensaje
                                </button>

                                <!-- Modal único para cada contacto -->
                                <div id="modal-{{ $contact->id }}" tabindex="-1" aria-hidden="true" 
                                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center 
                                    items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative p-4 w-full max-w-2xl max-h-full">
                                        <!-- Modal content -->
                                        <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                                            <!-- Modal header -->
                                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                    {{ $contact->name }}
                                                </h3>
                                                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 
                                                    rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center 
                                                    dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="modal-{{ $contact->id }}">
                                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" 
                                                        viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" 
                                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                    </svg>
                                                    <span class="sr-only">Cerrar</span>
                                                </button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="p-4 md:p-5 space-y-4">
                                                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                                    Correo: {{ $contact->email }}
                                                </p>
                                                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                                    Mensaje: {{ $contact->mensaje }}
                                                </p>
                                                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                                    Teléfono: {{ $contact->phone }}
                                                </p>
                                                <div class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                                    @php
                                                        $nota = $contactprivates_backend->where('submission_id', $contact->id)->first();
                                                        
                                                    @endphp

                                                    @if ($nota)
                                                        Nota: {{ $nota->notes }}
                                                    @else
                                                        <form action=" {{ route('contacto.privatestore') }}" method="POST" enctype="multipart/form-data" class="max-w-md mx-auto grid grid-cols-3 gap-4">
                                                            @csrf
                                                            <div class="mb-5 col-span-3">
                                                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-dark">Nota:</label>
                                                                <input id="name" type="text" name="notes" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nota">
                                                            </div>
                                                            <!-- campo con valor pre-seleccionado -->
                                                            <div class="mb-5 col-span-2">
                                                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-dark">ID del mensaje:</label>
                                                                <input id="name" value="{{ $contact->id }}"  readonly onmousedown="return false;" type="text" name="submission_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Mensaje">
                                                            </div>
                                                            <!-- campo con valor pre-seleccionado -->
                                                            <div class="mb-5 col-span-2">
                                                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-dark">Fecha:</label>
                                                                <input id="name" value="{{ now() }}"  readonly onmousedown="return false;" type="text" name="created_at" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Fecha">
                                                            </div>
                                                            <!-- campo con valor pre-seleccionado -->
                                                            <div class="mb-5 col-span-2">
                                                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-dark">Revisado por: {{ $user->name }} con el ID</label>
                                                                <input id="name" value="{{ $user->id }}"  readonly onmousedown="return false;" type="text" name="reviewed_by" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Revisado por">
                                                            </div>
                                                            <div class="mb-5 col-span-4">
                                                                <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded">Marcar como revisado</button>
                                                            </div>
                                                        </form>
                                                    @endif
                                                </div>
                                            </div>
                                            <!-- Modal footer -->
                                            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                                <button data-modal-hide="modal-{{ $contact->id }}" type="button" 
                                                    class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white 
                                                    rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 
                                                    focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 
                                                    dark:hover:text-white dark:hover:bg-gray-700">
                                                    Cerrar
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>                      
                        </div>
                    </li>
                </ul>
            @endforeach


            <div/>
        <div/>
    <div/>
</x-app-layout>