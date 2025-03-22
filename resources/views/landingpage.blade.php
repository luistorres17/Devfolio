<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Landing Page') }}
        </h2>
    </x-slot>
    <div class="py-12">
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
                                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                @else
                                    no se ha registado aún
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>


                
            </div>
        </div>
    </div>
</x-app-layout>