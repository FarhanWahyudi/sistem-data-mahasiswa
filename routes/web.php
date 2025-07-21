<?php

use App\Http\Controllers\MajorController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::controller(MajorController::class)->group(function () {
    Route::get('/admin/jurusan', 'index')->name('major.view');
    Route::get('/admin/jurusan/{id}', 'show')->name('major.show');
    Route::post('/admin/jurusan', 'store')->name('major.store');
    Route::post('/admin/jurusan/update/{id}', 'update')->name('major.update');
    Route::post('/admin/jurusan/delete/{id}', 'destroy')->name('major.destroy');
    Route::get('/admin/jurusan/{id}/students', 'students')->name('major.students');
});

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('dashboard');

Route::get('/admin/mahasiswa', function () {
    return view('admin.mahasiswa');
})->name('daftar.mahasiswa');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
