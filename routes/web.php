<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::controller(DashboardController::class)->group(function () {
    Route::get('/admin/dashboard', 'index')->name('dashboard.view');
});

Route::controller(StudentController::class)->group(function () {
    Route::get('/admin/mahasiswa', 'index')->name('student.view');
    Route::get('/admin/mahasiswa/{id}', 'show')->name('student.show');
    Route::post('/admin/mahasiswa', 'store')->name('student.store');
    Route::post('/admin/mahasiswa/update/{student}', 'update')->name('student.update');
    Route::post('/admin/mahasiswa/delete/{id}', 'destroy')->name('student.destroy');
    Route::get('/admin/mahasiswa/doc/pdf', 'exportPdf')->name('student.pdf');
    Route::get('/admin/mahasiswa/doc/excel', 'exportExcel')->name('student.excel');
});

Route::controller(MajorController::class)->group(function () {
    Route::get('/admin/jurusan', 'index')->name('major.view');
    Route::get('/admin/jurusan/{id}', 'show')->name('major.show');
    Route::post('/admin/jurusan', 'store')->name('major.store');
    Route::post('/admin/jurusan/update/{id}', 'update')->name('major.update');
    Route::post('/admin/jurusan/delete/{id}', 'destroy')->name('major.destroy');
    Route::get('/admin/jurusan/{id}/students', 'students')->name('major.students');
});


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
