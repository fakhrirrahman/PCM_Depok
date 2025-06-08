<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\StrukturOrganisasiController;
use App\Filament\pages\CustomDashboard;

Route::get('/', [KegiatanController::class, 'index'])->name('home');
Route::get('/kegiatan', [KegiatanController::class, 'kegiatan'])->name('kegiatan');
Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri');

Route::get('/kegiatan/{id}', [KegiatanController::class, 'show'])->name('kegiatan.show');

Route::get('/contact', [ContactController::class, 'showForm'])->name('contact');
Route::post('/contact/submit', [ContactController::class, 'submitForm'])->name('contact.submit');
Route::get('/tentang-kami', [AboutController::class, 'index'])->name('tentang-kami');

Route::get('/struktur-organisasi', [StrukturOrganisasiController::class, 'index'])->name('struktur-organisasi');


Route::get('/test-session', function () {
    session(['dashboard_filters' => ['from' => '2024-01-01']]);
    session()->save();
    return 'Session set.';
});

Route::get('/check-session', function () {
    return session('dashboard_filters');
});