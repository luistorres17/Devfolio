<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Landing Page</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="bg-gray-100 text-gray-900">

        <header>
            <nav class="bg-white border-gray-200 px-4 lg:px-6 py-2.5 dark:bg-gray-800 fixed top-0 left-0 right-0 z-50">
                <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
                    <a href="{{ route('home') }}" class="flex items-center">
                        <img src="{{ asset('storage/icons/dev.svg') }}" class="mr-3 h-6 sm:h-9" alt="Flowbite Logo" />
                        <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Mi Portafolio</span>
                    </a>
                    <div class="flex items-center lg:order-2">
                        <a href="{{ route('login') }}" class="text-gray-800 dark:text-white hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">Log in</a>
                    </div>
                    <div class="hidden justify-between items-center w-full lg:flex lg:w-auto lg:order-1" id="mobile-menu-2">
                        <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                            <li>
                                <a href="#home" class="block py-2 pr-4 pl-3 text-white rounded bg-primary-700 lg:bg-transparent lg:text-primary-700 lg:p-0 dark:text-white" aria-current="page">Home</a>
                            </li>
                            <li>
                                <a href="#proyectos" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Proyectos</a>
                            </li>
                            <li>
                                <a href="#quiensoy" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Quién Soy</a>
                            </li>
                            <li>
                                <a href="#contacto" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Contactame</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>


        <section class="bg-white dark:bg-gray-900 h-screen " id ="home" >
            <div class="grid max-w-screen-xl h-full px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 items-center reveal">
                <div class="mr-auto place-self-center lg:col-span-7">
                    <h1 class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl dark:text-white">
                        @if($hero)
                            Hola soy {{ $user->name }} 
                        @else
                            sin datos en la tabla de la db
                        @endif
                    </h1>
                    <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">
                        @if($hero)
                            {{ $hero->welcome_text }}
                        @else
                            sin datos en la tabla de la db
                        @endif
                    </p>
                    <a href="#proyectos" class="inline-flex items-center justify-center px-5 py-3 mr-3 text-base font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900">
                        Ver Proyectos
                        <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </a>
                    <a href="#contacto" class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-gray-900 border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                        Contactame
                    </a> 
                </div>
                <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
                    <div id="gallery" class="relative w-full" data-carousel="slide">
                        <!-- Carousel wrapper -->
                        <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                            <!-- Item 1 -->
                            
                            @foreach ($imgs as $img)
                                <div class="relative h-56 overflow-hidden rounded-lg md:h-96" data-carousel-item>
                                    <img src="{{ asset('storage/landing/' . $img->path) }}" alt="{{$img -> alt}}" class="absolute block w-full h-full transition-transform duration-700 ease-in-out" alt="{{ $img->alt }}">
                                </div>
                            @endforeach
                            
                        </div>
                        <!-- Slider controls -->
                        <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                                </svg>
                                <span class="sr-only">Previous</span>
                            </span>
                        </button>
                        <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                                </svg>
                                <span class="sr-only">Next</span>
                            </span>
                        </button>
                    </div>
                </div>                
            </div>
        </section>

        <section class="bg-white dark:bg-gray-900 h-screen flex justify-center items-center" id="quiensoy">
    <div class="max-w-screen-md h-full px-4 py-8 mx-auto flex flex-col justify-center items-center text-center reveal">
        <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">
            Quién Soy
        </h2>

        <p class="text-lg text-gray-600 mb-8 text-justify">
            @if($abouts)
                {{ $abouts->descripcion }}
            @else
                No datos en la tabla de la db
            @endif
        </p>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 w-full">
            <div>
                <h3 class="text-2xl font-semibold text-gray-800 mb-2">
                    Experiencia
                </h3>
                <p class="text-gray-600 text-justify">
                    @if($abouts)
                        {{ $abouts->experiencia }}
                    @else
                        No datos en la tabla de la db
                    @endif
                </p>
            </div>

            <div>
                <h3 class="text-2xl font-semibold text-gray-800 mb-2">
                    Mis perfiles de Contacto
                </h3>
                <ul class="list-disc pl-5 space-y-2 text-gray-600 text-justify" ">
                    <li>
                        @if($abouts)
                            <a href="{{ $abouts->github }}" target="_blank" class="text-blue-600 dark:text-blue-500 hover:underline">Github</a>
                        @else
                            No datos en la tabla de la db
                        @endif
                    </li>
                    <li>
                        @if($abouts)
                            <a href="{{ $abouts->linkedin }}" target="_blank" class="text-blue-600 dark:text-blue-500 hover:underline">Linkedin</a>
                        @else
                            No datos en la tabla de la db
                        @endif
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>


<section class="bg-white dark:bg-gray-900 h-screen flex justify-center items-center" id="proyectos">
    <div class="max-w-screen-md h-full px-4 py-8 mx-auto flex flex-col justify-center items-center text-center reveal">
        <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">
            Proyectos
        </h2>
        <ol class="relative border-s border-gray-200 dark:border-gray-700">
            @if($projects)
                @foreach ($projects as $project)                  
                    <li class="mb-10 ms-4">
                        <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -start-1.5 border border-white dark:border-gray-900 dark:bg-gray-700"></div>
                        <time class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">{{ $project->fecha_realizacion }}</time>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white text-justify">{{ $project->nameProject }}</h3>
                        <p class="text-base font-normal text-gray-500 dark:text-gray-400 text-justify">{{ $project->descripcion }}</p>
                        <!-- imagen -->
                        <div class="flex items-center justify-center">
                            <img src="{{ $project->image ? asset('storage/' . $project->image) : asset('images/default.png') }}" alt="{{ $project->nameProject }}" class="w-20 h-20 rounded-full object-cover">
                        </div>
                        <a href="{{ $project->link_url }}" target="_blank" class="mt-4 text-sm font-semibold text-blue-600 dark:text-blue-500 hover:underline">Ver Proyecto</a>
                    </li>
                @endforeach
            @else
                <p> sin datos en la tabla de la db</p>
            @endif
        </ol>
    </div>
</section>

        
        <section class="bg-white dark:bg-gray-900 h-screen " id ="contacto" >
            <div class="max-w-screen-xl h-full px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 items-center reveal">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-center text-gray-900 dark:text-white">Contactame</h2>
                <p class="mb-8 lg:mb-16 font-light text-center text-gray-500 dark:text-gray-400 sm:text-xl">¿tienes alguna pregunta? ¿necesitas ayuda? ¿quieres saber más? ¡No dudes en ponerte en contacto!</p>
                <form action="{{ route('home.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                    @csrf
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tu email</label>
                        <input type="email" id="email" name="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" placeholder="name@correo.com" required>
                    </div>
                    <div>
                        <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tu teléfono</label>
                        <input type="tel" id="phone" name="phone" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" placeholder="123456789" required>
                    </div>
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tu nombre</label>
                        <input type="text" id="name" name="name" class="block p-3 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 shadow-sm focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" placeholder="Nombre" required>
                    </div>
                    <div class="sm:col-span-2">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Tu mensaje</label>
                        <textarea name="mensaje" required class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg shadow-sm border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Deja un comentario o pregunta..."></textarea>
                    </div>
                    <button type="submit" class="py-3 px-5 text-sm font-medium text-center text-white rounded-lg bg-primary-700 sm:w-fit hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Enviar mensaje</button>
                </form>
            </div>
        </section>

        <footer class="bg-white rounded-lg shadow sm:flex sm:items-center sm:justify-between p-4 sm:p-6 xl:p-8 dark:bg-gray-800 antialiased">
            <p class="mb-4 text-sm text-center text-gray-500 dark:text-gray-400 sm:mb-0">
                &copy; 2025-2026 . All rights reserved {{ $user->name }}
            </p>
        </footer>

    </body>
</html>
