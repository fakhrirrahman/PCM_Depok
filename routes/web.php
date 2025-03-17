<?php

use App\Http\Controllers\AnggotaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\KegiatanController;

Route::get('/', [KegiatanController::class, 'index'])->name('home');
Route::get('/blog', [KegiatanController::class, 'blog'])->name('blog');
Route::get('/anggota', [AnggotaController::class, 'index'])->name('anggota');
Route::get('/about', [AnggotaController::class, 'about'])->name('about');

Route::get('/contact', [ContactController::class, 'showForm'])->name('contact');
Route::post('/contact/submit', [ContactController::class, 'submitForm'])->name('contact.submit');

Route::get('/pricing', function () {
    return view('pricing');
})->name('pricing');
