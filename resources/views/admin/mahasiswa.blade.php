@extends('layouts.admin')

@section('content')

<div class="flex flex-col gap-8 pb-10">
    <div class="flex items-center justify-between">
        <div class="text-white font-medium">
            <span class="text-sm"><a href="{{ route('dashboard.view') }}" class="text-gray-300">Admin</a> / Mahasiswa</span>
            <h1 class="font-semibold">Daftar Mahasiswa</h1>
        </div>
        <div class="flex items-center gap-5">
            <button id="darkModeToggle">
                <svg class="hidden w-5 text-white dark:block" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M361.5 1.2c5 2.1 8.6 6.6 9.6 11.9L391 121l107.9 19.8c5.3 1 9.8 4.6 11.9 9.6s1.5 10.7-1.6 15.2L446.9 256l62.3 90.3c3.1 4.5 3.7 10.2 1.6 15.2s-6.6 8.6-11.9 9.6L391 391 371.1 498.9c-1 5.3-4.6 9.8-9.6 11.9s-10.7 1.5-15.2-1.6L256 446.9l-90.3 62.3c-4.5 3.1-10.2 3.7-15.2 1.6s-8.6-6.6-9.6-11.9L121 391 13.1 371.1c-5.3-1-9.8-4.6-11.9-9.6s-1.5-10.7 1.6-15.2L65.1 256 2.8 165.7c-3.1-4.5-3.7-10.2-1.6-15.2s6.6-8.6 11.9-9.6L121 121 140.9 13.1c1-5.3 4.6-9.8 9.6-11.9s10.7-1.5 15.2 1.6L256 65.1 346.3 2.8c4.5-3.1 10.2-3.7 15.2-1.6zM160 256a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zm224 0a128 128 0 1 0 -256 0 128 128 0 1 0 256 0z"/></svg>
                <svg  class="w-4 text-white dark:hidden" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M223.5 32C100 32 0 132.3 0 256S100 480 223.5 480c60.6 0 115.5-24.2 155.8-63.4c5-4.9 6.3-12.5 3.1-18.7s-10.1-9.7-17-8.5c-9.8 1.7-19.8 2.6-30.1 2.6c-96.9 0-175.5-78.8-175.5-176c0-65.8 36-123.1 89.3-153.3c6.1-3.5 9.2-10.5 7.7-17.3s-7.3-11.9-14.3-12.5c-6.3-.5-12.6-.8-19-.8z"/></svg>
            </button>
            <div id="burger" class="flex flex-col items-end gap-1 w-5 cursor-pointer lg:hidden">
                <span class="hidden w-[70%]"></span>
                <span class="burger-span w-full h-0.5 rounded-sm bg-white transition-all duration-300"></span>
                <span class="w-full h-0.5 rounded-sm bg-white"></span>
                <span class="burger-span w-full h-0.5 rounded-sm bg-white transition-all duration-500"></span>
            </div>
        </div>
    </div>
    <div class="flex items-start flex-wrap gap-5 2xl:gap-8">
        <div class="w-full xl:w-[60%] bg-white rounded-xl border border-gray-200 p-5 2xl:p-8 dark:bg-[#132347] dark:border-[#132347] transition-all duration-300">
            <div class="flex items-start justify-between gap-2">
                <h2 class="text-gray-700 text-lg font-medium dark:text-white">Daftar Mahasiswa</h2>
                <button class="btn-add-student hidden gap-2 text-xs bg-blue-500 px-3 py-1.5 rounded-md text-gray-50 font-medium md:block md:text-sm">
                    Tambah Mahasiswa
                </button>
                <button class="btn-add-student gap-2 text-xs bg-blue-500 px-3 py-1.5 rounded-md text-gray-50 font-medium md:text-sm md:hidden">
                    +
                </button>
            </div>
            <div class="flex flex-col justify-between gap-2 mt-3 mb-1 sm:flex-row sm:items-center sm:gap-0">
                <div class="flex items-center gap-1.5">
                    <a href="{{ route('student.excel') }}" class="flex gap-1 text-xs bg-green-500 px-3 py-1.5 rounded-md text-gray-50 font-medium md:text-sm md:gap-2">
                        <svg class="w-4 text-gray-50" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M64 32C28.7 32 0 60.7 0 96L0 416c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-320c0-35.3-28.7-64-64-64L64 32zm88 64l0 64-88 0 0-64 88 0zm56 0l88 0 0 64-88 0 0-64zm240 0l0 64-88 0 0-64 88 0zM64 224l88 0 0 64-88 0 0-64zm232 0l0 64-88 0 0-64 88 0zm64 0l88 0 0 64-88 0 0-64zM152 352l0 64-88 0 0-64 88 0zm56 0l88 0 0 64-88 0 0-64zm240 0l0 64-88 0 0-64 88 0z"/></svg>
                        Export Excel
                    </a>
                    <a href="{{ route('student.pdf') }}" target="_blank" class="flex gap-1 text-xs bg-red-500 px-3 py-1.5 rounded-md text-gray-50 font-medium md:text-sm md:gap-2">
                        <svg class="w-4 text-gray-50" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M0 64C0 28.7 28.7 0 64 0L224 0l0 128c0 17.7 14.3 32 32 32l128 0 0 144-208 0c-35.3 0-64 28.7-64 64l0 144-48 0c-35.3 0-64-28.7-64-64L0 64zm384 64l-128 0L256 0 384 128zM176 352l32 0c30.9 0 56 25.1 56 56s-25.1 56-56 56l-16 0 0 32c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-48 0-80c0-8.8 7.2-16 16-16zm32 80c13.3 0 24-10.7 24-24s-10.7-24-24-24l-16 0 0 48 16 0zm96-80l32 0c26.5 0 48 21.5 48 48l0 64c0 26.5-21.5 48-48 48l-32 0c-8.8 0-16-7.2-16-16l0-128c0-8.8 7.2-16 16-16zm32 128c8.8 0 16-7.2 16-16l0-64c0-8.8-7.2-16-16-16l-16 0 0 96 16 0zm80-112c0-8.8 7.2-16 16-16l48 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 32 32 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 48c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-64 0-64z"/></svg>
                        Export PDF
                    </a>
                </div>
                <form method="GET" action="{{ route('student.view') }}" class="w-full sm:w-80 lg:w-96 xl:w-52 2xl:w-80">
                    <input type="text" name="search" value="{{ $search }}" class="w-full bg-transparent border border-indigo-500 rounded-md text-xs dark:text-gray-200 md:text-sm   " placeholder="Cari Mahasiswa">
                </form>
            </div>
            <div class="overflow-x-auto">
                <div class="w-[43rem] sm:w-full">
                    <table class="w-full mt-5">
                        <thead>
                            <tr class="border-b border-gray-200 gap-x-10 dark:border-gray-400 transition-all duration-300">
                                <th class="px-3 text-start text-gray-400 font-medium text-xs py-2 md:text-sm">NAMA</th>
                                <th class="px-3 text-start text-gray-400 font-medium text-xs py-2 md:text-sm">NIM</th>
                                <th class="px-3 text-start text-gray-400 font-medium text-xs py-2 md:text-sm">JURUSAN</th>
                                <th class="px-3 text-start text-gray-400 font-medium text-xs py-2 md:text-sm">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
    
                            @foreach ($students as $student)
                                <tr class="border-b border-gray-200 dark:border-gray-400 transition-all duration-300">
                                    <td class="px-3 text-xs py-4 text-gray-700 dark:text-gray-300 md:text-sm">{{ $student->name }}</td>
                                    <td class="px-3 text-xs py-4 text-gray-700 dark:text-gray-300 md:text-sm">{{ $student->nim }}</td>
                                    <td class="px-3 text-xs py-4 text-gray-700 dark:text-gray-300 md:text-sm">{{ $student->major->name }}</td>
                                    <td class="px-3 py-4">
                                        <div class="flex gap-2 md:gap-3">
                                            <button class="btn-show" data-id="{{ $student->id }}">
                                                <svg class="w-4 md:w-5 text-blue-500" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/></svg>
                                            </button>
                                            <button class="btn-edit" data-id="{{ $student->id }}">
                                                <svg class="w-3 md:w-4 text-yellow-500" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160L0 416c0 53 43 96 96 96l256 0c53 0 96-43 96-96l0-96c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 96c0 17.7-14.3 32-32 32L96 448c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l96 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 64z"/></svg>
                                            </button>
                                            <form method="POST" action="{{ route('student.destroy', $student->id) }}" class="flex items-center justify-center">
                                                @csrf
                                                <button type="submit">
                                                    <svg class="w-3 md:w-4 text-red-500" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M135.2 17.7L128 32 32 32C14.3 32 0 46.3 0 64S14.3 96 32 96l384 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-96 0-7.2-14.3C307.4 6.8 296.3 0 284.2 0L163.8 0c-12.1 0-23.2 6.8-28.6 17.7zM416 128L32 128 53.2 467c1.6 25.3 22.6 45 47.9 45l245.8 0c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
    
                        </tbody>
                    </table>
    
                    <div class="mt-4 flex justify-center gap-1.5">
    
                        @php
                            $currentPage = $students->currentPage();
                            $lastPage = $students->lastPage();
                            $start = max($currentPage - 2, 1);
                            $end = min($currentPage + 2, $lastPage);
                        @endphp
    
                        {{-- button prevent --}}
                        @if ($students->onFirstPage())
                            <span class="w-8 h-8 flex items-center justify-center border border-gray-300 rounded-md text-gray-400 dark:border-gray-500 cursor-not-allowed"><</span>
                        @else
                            <a href="{{ $students->previousPageUrl() }}" class="w-8 h-8 flex items-center justify-center border border-blue-600 rounded-md text-blue-600 hover:bg-blue-600 hover:text-white transition-all duration-300"><</a>
                        @endif
    
                        {{-- Titik sebelum --}}
                        @if ($start > 1)
                            <a href="{{ $students->url(1) }}" class="w-8 h-8 flex items-center justify-center border border-blue-600 rounded-md text-blue-600 hover:bg-blue-600 hover:text-white transition-all duration-300">1</a>
                            @if ($start > 2)
                                <span class="w-8 h-8 flex items-center justify-center border border-blue-600 rounded-md text-blue-600 hover:bg-blue-600 hover:text-white transition-all duration-300">...</span>
                            @endif
                        @endif
    
                        {{-- Nomor halaman tengah --}}
                        @for ($i = $start; $i <= $end; $i++)
                            @if ($i == $currentPage)
                                <span class="w-8 h-8 flex items-center justify-center bg-blue-600 text-white rounded-md">{{ $i }}</span>
                            @else
                                <a href="{{ $students->url($i) }}" class="w-8 h-8 flex items-center justify-center border border-blue-600 rounded-md text-blue-600 hover:bg-blue-600 hover:text-white transition-all duration-300">{{ $i }}</a>
                            @endif
                        @endfor
    
                        {{-- Titik setelah --}}
                        @if ($end < $lastPage)
                            @if ($end < $lastPage - 1)
                                <span class="w-8 h-8 flex items-center justify-center border border-blue-600 rounded-md text-blue-600 hover:bg-blue-600 hover:text-white transition-all duration-300">...</span>
                            @endif
                            <a href="{{ $students->url($lastPage) }}" class="w-8 h-8 flex items-center justify-center border border-blue-600 rounded-md text-blue-600 hover:bg-blue-600 hover:text-white transition-all duration-300">{{ $lastPage }}</a>
                        @endif
    
                        {{-- button next --}}
                        @if ($students->hasMorePages())
                            <a href="{{ $students->nextPageUrl() }}" class="w-8 h-8 flex items-center justify-center border border-blue-600 rounded-md text-blue-600 hover:bg-blue-600 hover:text-white transition-all duration-300">></a>
                        @else
                            <span class="w-8 h-8 flex items-center justify-center border border-gray-300 rounded-md text-gray-400 dark:border-gray-500 cursor-not-allowed">></span>
                        @endif
                    </div>
                </div>
            </div>
        </div>


        <div id="modal" class="hidden fixed top-0 left-0 w-full h-screen justify-center items-center xl:flex xl:flex-1 xl:static xl:w-auto xl:h-auto bg-black/50 backdrop-blur-sm xl:bg-transparent">
            <div id="modal-content" class="w-[90%] max-h-[80vh] overflow-y-auto scrollbar-hide bg-white rounded-xl border border-gray-200 p-5 2xl:p-8 dark:bg-[#132347] dark:border-[#132347]  sm:w-[80%] md:w-[60%] lg:w-[50%] xl:h-auto xl:w-full transition-all duration-300">
                <div id="data-student-empty" class="h-96 flex justify-center items-center">
                    <h2 class="text-gray-700 text-xl text-center dark:text-gray-300">Pilih aksi untuk melihat atau mengedit data mahasiswa</h2>
                </div>
    
                {{-- add student --}}
                <div id="add-student" class="hidden">
                    <div class="flex items-center justify-between">
                        <h2 class="text-gray-700 font-medium text-lg dark:text-white">Tambah Mahasiswa</h2>     
                        <button class="xl:hidden" onclick="document.getElementById('modal').classList.add('hidden')">
                            <svg class="text-red-500 w-2.5" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M376.6 84.5c11.3-13.6 9.5-33.8-4.1-45.1s-33.8-9.5-45.1 4.1L192 206 56.6 43.5C45.3 29.9 25.1 28.1 11.5 39.4S-3.9 70.9 7.4 84.5L150.3 256 7.4 427.5c-11.3 13.6-9.5 33.8 4.1 45.1s33.8 9.5 45.1-4.1L192 306 327.4 468.5c11.3 13.6 31.5 15.4 45.1 4.1s15.4-31.5 4.1-45.1L233.7 256 376.6 84.5z"/></svg>
                        </button>
                    </div>
                    <form id="student-form" method="POST">
                        @csrf
                        <div class="flex flex-col gap-4 mt-5">
                            <div class="flex flex-col gap-2 2xl:flex-row 2xl:gap-0">
                                <label for="nim" class="w-36 flex-shrink-0 text-gray-600 dark:text-gray-200 text-sm sm:text-base">NIM</label>
                                <div class="w-full">
                                    <input id="nim" name="nim" type="number" class="w-full no-spinner bg-transparent border border-indigo-500 rounded-md text-gray-900 dark:text-gray-200 text-sm sm:text-base">
                                    <span id="nim-error" class="text-red-500 mt-1 text-xs sm:text-sm"></span>
                                </div>
                            </div>
                            <div class="flex flex-col gap-2 2xl:flex-row 2xl:gap-0">
                                <label for="name" class="w-36 flex-shrink-0 text-gray-600 dark:text-gray-200 text-sm sm:text-base">NAMA</label>
                                <div class="w-full">
                                    <input id="name" name="name" type="text" class="w-full bg-transparent border border-indigo-500 rounded-md text-gray-900 dark:text-gray-200 text-sm sm:text-base">
                                    <span id="name-error" class="text-red-500 mt-1 text-xs sm:text-sm"></span>
                                </div>
                            </div>
                            <div class="flex flex-col gap-2 2xl:flex-row 2xl:gap-0">
                                <label for="major" class="w-36 flex-shrink-0 text-gray-600 dark:text-gray-200 text-sm sm:text-base">JURUSAN</label>
                                <div class="w-full">
                                    <select id="major" name="major" class="w-full bg-transparent border border-indigo-500 rounded-md text-gray-900 dark:text-gray-200 text-sm sm:text-base">
                                        <option value="" class="dark:bg-[#132347]" selected disabled>Pilih Jurusan</option>
                                        @foreach ($majors as $major)
                                            <option value="{{ $major->id }}" class="dark:bg-[#132347]">{{ $major->name }}</option>
                                        @endforeach
                                    </select>
                                    <span id="major-error" class="text-red-500 mt-1 text-xs sm:text-sm"></span>
                                </div>
                            </div>
                            <div class="flex flex-col gap-2 2xl:flex-row 2xl:gap-0">
                                <label for="birth-date" class="w-36 flex-shrink-0 text-gray-600 dark:text-gray-200 text-sm sm:text-base">TANGGAL LAHIR</label>
                                <div class="w-full">
                                    <input id="birth-date" name="birth_date" type="date" class="w-full bg-transparent border border-indigo-500 rounded-md text-gray-900 dark:text-gray-200 text-sm sm:text-base">
                                    <span id="birth-date-error" class="text-red-500 mt-1 text-xs sm:text-sm"></span>
                                </div>
                            </div>
                            <div class="flex flex-col gap-2 2xl:flex-row 2xl:gap-0">
                                <label for="gender" class="w-36 flex-shrink-0 text-gray-600 dark:text-gray-200 text-sm sm:text-base">GENDER</label>
                                <div class="w-full">
                                    <select id="gender" name="gender" class="w-full bg-transparent border border-indigo-500 rounded-md text-gray-900 dark:text-gray-200 text-sm sm:text-base">
                                        <option value="" class="dark:bg-[#132347]" selected disabled>Pilih Gender</option>
                                        <option value="male" class="dark:bg-[#132347]">Laki-laki</option>
                                        <option value="female" class="dark:bg-[#132347]">Perempuan</option>
                                    </select>
                                    <span id="gender-error" class="text-red-500 mt-1 text-xs sm:text-sm"></span>
                                </div>
                            </div>
                            <div class="flex items-center gap-5 mt-5">
                                <hr class="w-full border-t border-gray-400">
                                <h2 class="text-gray-600 dark:text-gray-200 text-sm sm:text-base">ALAMAT</h2>
                                <hr class="w-full border-t border-gray-400">
                            </div>
                            <div class="flex flex-col gap-2 2xl:flex-row 2xl:gap-0">
                                <label for="kecamatan" class="w-36 flex-shrink-0 text-gray-600 dark:text-gray-200 text-sm sm:text-base">KEC</label>
                                <div class="w-full">
                                    <input id="kecamatan" name="kecamatan" type="text" class="w-full bg-transparent border border-indigo-500 rounded-md text-gray-900 dark:text-gray-200 text-sm sm:text-base">
                                    <span id="kec-error" class="text-red-500 mt-1 text-xs sm:text-sm"></span>
                                </div>
                            </div>
                            <div class="flex flex-col gap-2 2xl:flex-row 2xl:gap-0">
                                <label for="kabupaten" class="w-36 flex-shrink-0 text-gray-600 dark:text-gray-200 text-sm sm:text-base">KAB</label>
                                <div class="w-full">
                                    <input id="kabupaten" name="kabupaten" type="text" class="w-full bg-transparent border border-indigo-500 rounded-md text-gray-900 dark:text-gray-200 text-sm sm:text-base">
                                    <span id="kab-error" class="text-red-500 mt-1 text-xs sm:text-sm"></span>
                                </div>
                            </div>
                            <div class="flex flex-col gap-2 2xl:flex-row 2xl:gap-0">
                                <label for="provinsi" class="w-36 flex-shrink-0 text-gray-600 dark:text-gray-200 text-sm sm:text-base">PROVINSI</label>
                                <div class="w-full">
                                    <input id="provinsi" name="provinsi" type="text" class="w-full bg-transparent border border-indigo-500 rounded-md text-gray-900 dark:text-gray-200 text-sm sm:text-base">
                                    <span id="prov-error" class="text-red-500 mt-1 text-xs sm:text-sm"></span>
                                </div>
                            </div>
                            <div class="flex justify-end">
                                <button class="bg-blue-500 font-medium px-3 py-1.5 text-white rounded-md text-sm sm:text-base">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
    
                {{-- show student --}}
                <div id="show-student" class="hidden">
                    <div class="flex items-center justify-between">
                        <h2 class="text-gray-700 font-medium text-lg dark:text-white">Detail Mahasiswa</h2>     
                        <button class="xl:hidden" onclick="document.getElementById('modal').classList.add('hidden')">
                            <svg class="text-red-500 w-2.5" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M376.6 84.5c11.3-13.6 9.5-33.8-4.1-45.1s-33.8-9.5-45.1 4.1L192 206 56.6 43.5C45.3 29.9 25.1 28.1 11.5 39.4S-3.9 70.9 7.4 84.5L150.3 256 7.4 427.5c-11.3 13.6-9.5 33.8 4.1 45.1s33.8 9.5 45.1-4.1L192 306 327.4 468.5c11.3 13.6 31.5 15.4 45.1 4.1s15.4-31.5 4.1-45.1L233.7 256 376.6 84.5z"/></svg>
                        </button>
                    </div>
                    <div id="show-student-container" class="flex flex-col gap-2 mt-5">
                        
                    </div>
                </div>
    
                {{-- edit student --}}
                <div id="edit-student" class="hidden">
                    <div class="flex items-center justify-between">
                        <h2 class="text-gray-700 font-medium text-lg dark:text-white">Edit</h2>     
                        <button class="xl:hidden" onclick="document.getElementById('modal').classList.add('hidden')">
                            <svg class="text-red-500 w-2.5" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M376.6 84.5c11.3-13.6 9.5-33.8-4.1-45.1s-33.8-9.5-45.1 4.1L192 206 56.6 43.5C45.3 29.9 25.1 28.1 11.5 39.4S-3.9 70.9 7.4 84.5L150.3 256 7.4 427.5c-11.3 13.6-9.5 33.8 4.1 45.1s33.8 9.5 45.1-4.1L192 306 327.4 468.5c11.3 13.6 31.5 15.4 45.1 4.1s15.4-31.5 4.1-45.1L233.7 256 376.6 84.5z"/></svg>
                        </button>
                    </div>
                    <form id="student-edit-form" method="POST">
                        @csrf
                        <input type="hidden" name="id-student" id="input-id">
                        <div class="flex flex-col gap-4 mt-5">
                            <div class="flex flex-col gap-2 2xl:flex-row 2xl:gap-0">
                                <label for="edit-nim" class="w-36 flex-shrink-0 text-gray-600 dark:text-gray-200 text-sm sm:text-base">NIM</label>
                                <div class="w-full">
                                    <input id="edit-nim" name="nim" type="number" class="w-full no-spinner bg-transparent border border-indigo-500 rounded-md text-gray-900 dark:text-gray-200 text-sm sm:text-base">
                                    <span id="edit-nim-error" class="text-red-500 mt-1 text-xs sm:text-sm"></span>
                                </div>
                            </div>
                            <div class="flex flex-col gap-2 2xl:flex-row 2xl:gap-0">
                                <label for="edit-name" class="w-36 flex-shrink-0 text-gray-600 dark:text-gray-200 text-sm sm:text-base">NAMA</label>
                                <div class="w-full">
                                    <input id="edit-name" name="name" type="text" class="w-full bg-transparent border border-indigo-500 rounded-md text-gray-900 dark:text-gray-200 text-sm sm:text-base">
                                    <span id="edit-name-error" class="text-red-500 mt-1 text-xs sm:text-sm"></span>
                                </div>
                            </div>
                            <div class="flex flex-col gap-2 2xl:flex-row 2xl:gap-0">
                                <label for="edit-major" class="w-36 flex-shrink-0 text-gray-600 dark:text-gray-200 text-sm sm:text-base">JURUSAN</label>
                                <div class="w-full">
                                    <select id="edit-major" name="major" class="w-full bg-transparent border border-indigo-500 rounded-md text-gray-900 dark:text-gray-200 text-sm sm:text-base">
                                        @foreach ($majors as $major)
                                            <option value="{{ $major->id }}" class="dark:bg-[#132347]">{{ $major->name }}</option>
                                        @endforeach
                                    </select>
                                    <span id="edit-major-error" class="text-red-500 mt-1 text-xs sm:text-sm"></span>
                                </div>
                            </div>
                            <div class="flex flex-col gap-2 2xl:flex-row 2xl:gap-0">
                                <label for="edit-birth-date" class="w-36 flex-shrink-0 text-gray-600 dark:text-gray-200 text-sm sm:text-base">TANGGAL LAHIR</label>
                                <div class="w-full">
                                    <input id="edit-birth-date" name="birth_date" type="date" class="w-full bg-transparent border border-indigo-500 rounded-md text-gray-900 dark:text-gray-200 text-sm sm:text-base">
                                    <span id="edit-birth-date-error" class="text-red-500 mt-1 text-xs sm:text-sm"></span>
                                </div>
                            </div>
                            <div class="flex flex-col gap-2 2xl:flex-row 2xl:gap-0">
                                <label for="edit-gender" class="w-36 flex-shrink-0 text-gray-600 dark:text-gray-200 text-sm sm:text-base">GENDER</label>
                                <div class="w-full">
                                    <select id="edit-gender" name="gender" class="w-full bg-transparent border border-indigo-500 rounded-md text-gray-900 dark:text-gray-200 text-sm sm:text-base">
                                        <option value="male" class="dark:bg-[#132347]">Laki-laki</option>
                                        <option value="female" class="dark:bg-[#132347]">Perempuan</option>
                                    </select>
                                    <span id="edit-gender-error" class="text-red-500 mt-1 text-xs sm:text-sm"></span>
                                </div>
                            </div>
                            <div class="flex items-center gap-5 mt-5">
                                <hr class="w-full border-t border-gray-400">
                                <h2 class="text-gray-600 dark:text-gray-200 text-sm sm:text-base">ALAMAT</h2>
                                <hr class="w-full border-t border-gray-400">
                            </div>
                            <div class="flex flex-col gap-2 2xl:flex-row 2xl:gap-0">
                                <label for="edit-kecamatan" class="w-36 flex-shrink-0 text-gray-600 dark:text-gray-200 text-sm sm:text-base">KEC</label>
                                <div class="w-full">
                                    <input id="edit-kecamatan" name="kecamatan" type="text" class="w-full bg-transparent border border-indigo-500 rounded-md text-gray-900 dark:text-gray-200 text-sm sm:text-base">
                                    <span id="edit-kec-error" class="text-red-500 mt-1 text-xs sm:text-sm"></span>
                                </div>
                            </div>
                            <div class="flex flex-col gap-2 2xl:flex-row 2xl:gap-0">
                                <label for="edit-kabupaten" class="w-36 flex-shrink-0 text-gray-600 dark:text-gray-200 text-sm sm:text-base">KAB</label>
                                <div class="w-full">
                                    <input id="edit-kabupaten" name="kabupaten" type="text" class="w-full bg-transparent border border-indigo-500 rounded-md text-gray-900 dark:text-gray-200 text-sm sm:text-base">
                                    <span id="edit-kab-error" class="text-red-500 mt-1 text-xs sm:text-sm"></span>
                                </div>
                            </div>
                            <div class="flex flex-col gap-2 2xl:flex-row 2xl:gap-0">
                                <label for="edit-provinsi" class="w-36 flex-shrink-0 text-gray-600 dark:text-gray-200 text-sm sm:text-base">PROVINSI</label>
                                <div class="w-full">
                                    <input id="edit-provinsi" name="provinsi" type="text" class="w-full bg-transparent border border-indigo-500 rounded-md text-gray-900 dark:text-gray-200 text-sm sm:text-base">
                                    <span id="edit-prov-error" class="text-red-500 mt-1 text-xs sm:text-sm"></span>
                                </div>
                            </div>
                            <div class="flex justify-end">
                                <button type="submit" class="bg-blue-500 font-medium px-3 py-1.5 text-white rounded-md text-sm sm:text-base">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
    @vite('resources/js/studentAction.js')
@endpush