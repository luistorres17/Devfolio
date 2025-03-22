<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
                <div class="p-6 text-gray-900 ">
                    <div class="grid grid-cols-3 gap-4 ">
                        <div class="rounded-xl overflow-hidden shadow-lg">
                            <div class="relative overflow-x-auto">
                                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                            <th scope="col" class="px-6 py-3">
                                                Nombre
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                @if($formabouts)
                                                    {{ $formabouts->name }}
                                                @else
                                                    No datos en la tabla de la db
                                                @endif
                                            </th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="rounded-xl overflow-hidden shadow-lg">
                            <div class="relative overflow-x-auto">
                                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                            <tr>
                                                <th scope="col" class="px-6 py-3">
                                                    Email
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                                                <td class ="px-6 py-4">
                                                @if($formabouts)
                                                    {{ $formabouts->email }}
                                                @else
                                                    No datos en la tabla de la db
                                                @endif
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        <div class="rounded-xl overflow-hidden shadow-lg">
                            <div class="relative overflow-x-auto">
                                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                            <th scope="col" class="px-6 py-3">
                                                Telefono
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                                            <td class ="px-6 py-4">
                                                @if($formabouts)
                                                    {{ $formabouts->phone }}
                                                @else
                                                    No datos en la tabla de la db
                                                @endif
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-span-4 rounded-xl overflow-hidden shadow-lg">
                            <div class="relative overflow-x-auto">
                                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                            <th scope="col" class="px-6 py-3">
                                                Descripcion
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                                            <td class ="px-6 py-4">
                                                @if($formabouts)
                                                    {{$formabouts->descripcion}}
                                                @else
                                                    No datos en la tabla de la db
                                                @endif
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="rounded-xl overflow-hidden shadow-lg">
                            <div class="relative overflow-x-auto">
                                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                            <th scope="col" class="px-6 py-3">
                                                Github
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                                            <td class ="px-6 py-4">
                                                @if($formabouts)
                                                    {{ $formabouts->github }}
                                                @else
                                                    No datos en la tabla de la db
                                                @endif
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="rounded-xl overflow-hidden shadow-lg ">
                        <div class="relative overflow-x-auto ">
                                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                            <th scope="col" class="px-6 py-3">
                                                linkedin
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 ">
                                            <td class ="px-6 py-4 ">
                                                @if($formabouts)
                                                    {{ $formabouts->linkedin }}
                                                @else
                                                    No datos en la tabla de la db
                                                @endif
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-span-4 rounded-xl overflow-hidden shadow-lg">
                        <div class="relative overflow-x-auto">
                                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                            <th scope="col" class="px-6 py-3">
                                                Experiencia
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                                            <td class ="px-6 py-4">
                                                @if($formabouts)
                                                    {{ $formabouts->experiencia }}
                                                @else
                                                    No datos en la tabla de la db
                                                @endif
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            
            <div class="p-6 text-gray-900 ">
                <div class="grid grid-cols-3 gap-4">
                    <div class="bg-blue-500 text-white rounded-2xl shadow-lg p-6 w-64 text-center">
                        <h2 class="text-xl font-bold">Proyectos Registrados</h2>
                        <p class="text-3xl font-extrabold mt-2">
                            @if($formprojects)
                                {{ $formprojects->count() }}
                            @else
                                {{ 0 }}
                            @endif
                        </p>
                    </div>
                    <div class="bg-blue-500 text-white rounded-2xl shadow-lg p-6 w-64 text-center">
                        <h2 class="text-xl font-bold">Mensajes de Contacto Recibidos</h2>
                        <p class="text-3xl font-extrabold mt-2">
                            <!-- si la tabla de contactpublics existe -->
                            @if($contactpublics)
                                <!-- contar cuantos registros tienen la colmna status = pendiente -->
                                {{ $contactpublics->where('status','pendiente')->count()}}
                            @else
                                {{ 0 }}
                            @endif
                        </p>
                    </div>
                    <div class="bg-blue-500 text-white rounded-2xl shadow-lg p-6 w-64 text-center">
                        <h2 class="text-xl font-bold">Visitas al sitio</h2>
                        <p class="text-3xl font-extrabold mt-2">
                            {{ 0 }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
