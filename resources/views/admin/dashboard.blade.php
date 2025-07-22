@extends('layouts.admin')

@section('content')

<div class="flex flex-col gap-8 pb-10">
    <div class="flex items-center justify-between">
        <div class="text-white font-medium">
            <span class="text-sm"><a href="{{ route('dashboard.view') }}" class="text-gray-300">Admin</a> / Dashboard</span>
            <h1 class="font-semibold">Dashboard</h1>
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
    <div class="grid grid-cols-4 gap-5">
        <div class="group col-span-full flex justify-between items-start px-3 py-4 rounded-xl border border-gray-200 bg-white sm:col-span-2 xl:col-span-1 dark:border-[#132347] dark:bg-[#132347] transition-all duration-300">
            <div class="h-full flex flex-col justify-between">
                <h2 class="text-gray-500 font-medium dark:text-gray-300">Total Mahasiswa</h2>
                <span class="text-3xl font-medium dark:text-white">{{ $totalStudents }}</span>
            </div>
            <div class="flex items-center justify-center bg-gradient-to-bl from-orange-500 to-orange-300 rounded-full w-11 h-11 group-hover:-translate-y-2 transition-all duration-300">
                <svg class="text-white w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                </svg>
            </div>
        </div>
        <div class="group col-span-full flex justify-between items-start px-3 py-4 rounded-xl border border-gray-200 bg-white sm:col-span-2 xl:col-span-1 dark:border-[#132347] dark:bg-[#132347] transition-all duration-300">
            <div class="h-full flex flex-col justify-between">
                <h2 class="text-gray-500 font-medium dark:text-gray-300">Mahasiswa Pria</h2>
                <span class="text-3xl font-medium dark:text-white">{{ $maleStudents }}</span>
            </div>
            <div class="flex items-center justify-center bg-gradient-to-bl from-blue-500 to-blue-300 rounded-full w-11 h-11 group-hover:-translate-y-2 transition-all duration-300">
                <svg class="text-white w-5" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M289.8 46.8c3.7-9 12.5-14.8 22.2-14.8l112 0c13.3 0 24 10.7 24 24l0 112c0 9.7-5.8 18.5-14.8 22.2s-19.3 1.7-26.2-5.2l-33.4-33.4L321 204.2c19.5 28.4 31 62.7 31 99.8c0 97.2-78.8 176-176 176S0 401.2 0 304s78.8-176 176-176c37 0 71.4 11.4 99.8 31l52.6-52.6L295 73c-6.9-6.9-8.9-17.2-5.2-26.2zM400 80s0 0 0 0s0 0 0 0s0 0 0 0zM176 416a112 112 0 1 0 0-224 112 112 0 1 0 0 224z"/></svg>
            </div>
        </div>
        <div class="group col-span-full flex justify-between items-start px-3 py-4 rounded-xl border border-gray-200 bg-white sm:col-span-2 xl:col-span-1 dark:border-[#132347] dark:bg-[#132347] transition-all duration-300">
            <div class="h-full flex flex-col justify-between">
                <h2 class="text-gray-500 font-medium dark:text-gray-300">Mahasiswa Wanita</h2>
                <span class="text-3xl font-medium dark:text-white">{{ $femaleStudents }}</span>
            </div>
            <div class="flex items-center justify-center bg-gradient-to-bl from-pink-500 to-pink-300 rounded-full w-11 h-11 group-hover:-translate-y-2 transition-all duration-300">
                <svg class="text-white w-5" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 384 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M80 176a112 112 0 1 1 224 0A112 112 0 1 1 80 176zM224 349.1c81.9-15 144-86.8 144-173.1C368 78.8 289.2 0 192 0S16 78.8 16 176c0 86.3 62.1 158.1 144 173.1l0 34.9-32 0c-17.7 0-32 14.3-32 32s14.3 32 32 32l32 0 0 32c0 17.7 14.3 32 32 32s32-14.3 32-32l0-32 32 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-32 0 0-34.9z"/></svg>
            </div>
        </div>
        <div class="group col-span-full flex justify-between items-start px-3 py-4 rounded-xl border border-gray-200 bg-white sm:col-span-2 xl:col-span-1 dark:border-[#132347] dark:bg-[#132347] transition-all duration-300">
            <div class="h-full flex flex-col justify-between">
                <h2 class="text-gray-500 font-medium dark:text-gray-300">Total Jurusan</h2>
                <span class="text-3xl font-medium dark:text-white">{{ $totalMajors }}</span>
            </div>
            <div class="flex items-center justify-center bg-gradient-to-bl from-green-500 to-green-300 rounded-full w-11 h-11 group-hover:-translate-y-2 transition-all duration-300">
                <svg class="text-white w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                </svg>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-2 gap-8">    
        <div class="col-span-full bg-white rounded-xl border border-gray-200 p-5 md:col-span-1 2xl:p-8 dark:bg-[#132347] dark:border-[#132347] transition-all duration-300">
            <h2 class="text-gray-500 font-medium dark:text-white">Total mahasiswa berdasarkan jenis kelamin</h2>
            <div class="mt-5 xl:h-96">
                <canvas id="myChart" data-male="{{ $maleStudents }}" data-female="{{ $femaleStudents }}"></canvas>
            </div>
        </div>
        <div class="col-span-full bg-white rounded-xl border border-gray-200 p-5 md:col-span-1 2xl:p-8 dark:bg-[#132347] dark:border-[#132347] transition-all duration-300">
            <h2 class="text-gray-500 font-medium dark:text-white">Total mahasiswa berdasarkan jurusan</h2>
            <div class="mt-5 xl:h-96">
                <canvas id="myChart2"
                data-majors='@json($majors->map(fn($m) => [
                    'name' => $m->name,
                    'count' => $m->total_students
                ]))'>
                </canvas>
            </div>
        </div>
    </div>
    <div class="flex items-start gap-8 flex-wrap">
        <div id="data-section" class="w-full xl:w-[60%] bg-white rounded-xl border border-gray-200 p-5 2xl:p-8 dark:bg-[#132347] dark:border-[#132347] transition-all duration-300">
            <h2 class="text-gray-500 font-medium dark:text-white">Daftar Mahasiswa</h2>
            <div class="flex flex-col items-stretch overflow-x-auto">
                <div class="w-[43rem] sm:w-full">
                    <table class="mt-5 w-full">
                        <thead>
                            <tr class="border-b border-gray-200 gap-x-10 dark:border-gray-400">
                                <th class="px-3 text-start text-gray-400 font-medium text-sm py-2">NAMA</th>
                                <th class="px-3 text-start text-gray-400 font-medium text-sm py-2">NIM</th>
                                <th class="px-3 text-start text-gray-400 font-medium text-sm py-2">TANGGAL LAHIR</th>
                                <th class="px-3 text-start text-gray-400 font-medium text-sm py-2">GENDER</th>
                                <th class="px-3 text-start text-gray-400 font-medium text-sm py-2">JURUSAN</th>
                            </tr>
                        </thead>
                        <tbody>
        
                            @foreach ($students as $student)
                                <tr class="border-b border-gray-200 dark:border-gray-400">
                                    <td class="px-3 text-sm py-4 text-gray-700 dark:text-gray-300">{{ $student->name }}</td>
                                    <td class="px-3 text-sm py-4 text-gray-700 dark:text-gray-300">{{ $student->nim }}</td>
                                    <td class="px-3 text-sm py-4 text-gray-700 dark:text-gray-300">{{ \Carbon\Carbon::parse($student->birth_date)->locale('id')->translatedFormat('d F Y') }}</td>
                                    <td class="px-3 text-sm py-4 text-gray-700 dark:text-gray-300">{{ $student->gender === 'male' ? 'Laki-laki' : 'Perempuan' }}</td>
                                    <td class="px-3 text-sm py-4 text-gray-700 dark:text-gray-300">{{ $student->major->name }}</td>
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
        <div class="w-full xl:flex-1 bg-white rounded-xl border border-gray-200 p-5 overflow-x-auto 2xl:p-8 dark:bg-[#132347] dark:border-[#132347] transition-all duration-300">
            <h2 class="text-gray-500 font-medium dark:text-white">Daftar Jurusan</h2>
            <table class="table-fixed w-full mt-5">
                <thead>
                    <tr class="border-b border-gray-200 dark:border-gray-400">
                        <th class="text-start px-3 text-gray-400 font-medium text-sm py-2">JURUSAN</th>
                        <th class="text-start px-3 text-gray-400 font-medium text-sm py-2">TOTAL MAHASISWA</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($majors as $major)
                        <tr class="border-b border-gray-200 dark:border-gray-400">
                            <td class="text-sm px-3 py-4 text-gray-700 dark:text-gray-300">{{ $major->name }}</td>
                            <td class="text-sm px-3 py-4 text-gray-700 dark:text-gray-300">{{ $major->total_students }}</td>
                        </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection


@push('scripts')
    @vite('resources/js/chart.js')
@endpush