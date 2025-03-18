<?php

use App\Http\Controllers\AnggotaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\KegiatanController;

Route::get('/', [KegiatanController::class, 'index'])->name('home');
Route::get('/kegiatan', [KegiatanController::class, 'kegiatan'])->name('kegiatan');
Route::get('/anggota', [AnggotaController::class, 'index'])->name('anggota');
Route::get('/tentang-kami', [AnggotaController::class, 'about'])->name('tentang-kami');

Route::get('/contact', [ContactController::class, 'showForm'])->name('contact');
Route::post('/contact/submit', [ContactController::class, 'submitForm'])->name('contact.submit');

Route::get('/struktur-anggota', function () {
    return view('struktur-anggota');
})->name('struktur-anggota');
