<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Cosmed') }} - @yield('title')</title>
        <meta name="description" content="@yield('description')" />

        
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col">

           
            <main class="flex-auto w-100 bg-indigo-50 p-2 flex justify-center">
                <div class="mb-20">  @yield('content') </div>
            </main>
            {{-- footer --}}
            {{-- <footer class="p-2 bg-indigo-200">Footer</footer> --}}
            
<footer class="p-4 bg-white  shadow md:flex md:items-center md:justify-between md:p-6 dark:bg-gray-800">
    <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2022 
        <a href="{{ config('app.url', 'cosmed.com') }}" class="hover:underline">Cosmed</a>. Tous droits réservés.
    </span>

    <address class="text-sm text-gray-500 sm:text-center dark:text-gray-400">
        Cosmed, Rue Abou Jibal N°8, Rabat, 10 000, Maroc
        Tél :  <a href="tel:035 9767 909">035 9767 909</a>,Fax :11 11 11 11 11
        <br>
    </address>
</footer>
            {{-- end footer --}}
        </div>

    </body>
</html>
