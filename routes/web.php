<?php

use App\Http\Controllers\AnggotaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\StrukturOrganisasiController;

Route::get('/', [KegiatanController::class, 'index'])->name('home');
Route::get('/kegiatan', [KegiatanController::class, 'kegiatan'])->name('kegiatan');
Route::get('/anggota', [AnggotaController::class, 'index'])->name('anggota');
Route::get('/tentang-kami', [AnggotaController::class, 'about'])->name('tentang-kami');
Route::get('/kegiatan/{id}', [KegiatanController::class, 'show'])->name('kegiatan.show');

Route::get('/contact', [ContactController::class, 'showForm'])->name('contact');
Route::post('/contact/submit', [ContactController::class, 'submitForm'])->name('contact.submit');

Route::get('/struktur-organisasi', [StrukturOrganisasiController::class, 'index'])->name('struktur-organisasi');
