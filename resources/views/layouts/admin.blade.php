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
        @stack('scripts')
    </head>
    <body class="font-poppins antialiased">
        <div class="fixed top-0 left-0 w-full h-screen bg-gray-50 -z-10 dark:bg-[#0E1B31] transition-all duration-300">
            <div class="w-full h-[30vh] bg-indigo-500 dark:bg-[#0E1B49] transition-all duration-300"></div>
        </div>
        <div id="navigation" class="hidden lg:block fixed top-1/2 left-0 transform -translate-x-full -translate-y-1/2 w-56 h-[95vh] border border-gray-200 bg-white rounded-2xl p-5 xl:w-72 lg:translate-x-5 transition-all duration-300 dark:bg-[#132347] dark:border-[#132347]">
            <div class="flex flex-col justify-between h-full">
                <div>
                    <h2 class="text-center text-gray-700 text-2xl font-medium dark:text-gray-200">
                        Sistem Data Mahasiswa
                    </h2>
                    <hr class="border-t border-gray-300 my-5">
                    <div class="flex flex-col gap-1">
                        @php
                            $dashboard = request()->is('admin/dashboard');
                            $mahasiswa = request()->is('admin/mahasiswa');
                            $jurusan = request()->is('admin/jurusan');
                        @endphp
                        <a href="{{ route('dashboard.view') }}" class="{{ $dashboard ? 'bg-indigo-100 dark:bg-indigo-900' : 'bg-transparent' }} flex items-center gap-5 py-4 px-3 rounded-lg hover:bg-indigo-100 transition-all duration-300 dark:hover:bg-indigo-900">
                            <svg class="text-blue-500 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 17.25v1.007a3 3 0 0 1-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0 1 15 18.257V17.25m6-12V15a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 15V5.25m18 0A2.25 2.25 0 0 0 18.75 3H5.25A2.25 2.25 0 0 0 3 5.25m18 0V12a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 12V5.25" />
                            </svg>
                            <span class="text-gray-600 font-medium dark:text-gray-300">Dashboard</span>
                        </a>
                        <a href="{{ route('student.view') }}" class="{{ $mahasiswa ? 'bg-indigo-100 dark:bg-indigo-900' : 'bg-transparent' }} flex items-center gap-5 py-4 px-3 rounded-lg hover:bg-indigo-100 transition-all duration-300 dark:hover:bg-indigo-900">
                            <svg class="text-orange-500 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                            </svg>
                            <span class="text-gray-600 font-medium dark:text-gray-300">Mahasiswa</span>
                        </a>
                        <a href="{{ route('major.view') }}" class="{{ $jurusan ? 'bg-indigo-100 dark:bg-indigo-900' : 'bg-transparent' }} flex items-center gap-5 py-4 px-3 rounded-lg hover:bg-indigo-100 transition-all duration-300 dark:hover:bg-indigo-900">
                            <svg class="text-green-500 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                            </svg>
                            <span class="text-gray-600 font-medium dark:text-gray-300">Jurusan</span>
                        </a>
                    </div>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center gap-2 py-4 px-3 border border-red-200 rounded-lg hover:bg-red-200 transition-all duration-300 dark:border-red-900 dark:hover:bg-red-900">
                        <svg class="text-red-500 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75" />
                        </svg>
                        <span class="text-gray-600 font-medium dark:text-gray-300">Logout</span>
                    </button>
                </form>
            </div>
        </div>
        <div class="mt-7 px-5 lg:ml-60 xl:px-10 xl:ml-72">
            @yield('content')
        </div>
    </body>
</html>