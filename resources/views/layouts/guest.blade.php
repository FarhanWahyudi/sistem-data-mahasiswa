<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-poppins text-gray-900 antialiased">
        <div class="min-h-screen flex justify-center items-center bg-gray-100">
            <div class="w-full h-screen flex items-center justify-center px-6 py-10 bg-white shadow-md overflow-hidden rounded-xl sm:h-auto sm:w-[50%] xl:w-[30%] 2xl:w-[25%]">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
