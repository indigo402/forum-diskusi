<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PertanyaanController;
use App\Http\Controllers\JawabanController;
use App\Http\Controllers\ProfileController;

// ✅ Root redirect ke home (yang sudah diproteksi auth)
Route::get('/', function () {
    return redirect()->route('home');
});

// ✅ Auth routes (login, register, dll)
Auth::routes();

// ✅ Semua route yang butuh login
Route::middleware('auth')->group(function () {

    // Home
    Route::get('/home', [HomeController::class, 'home'])->name('home');

    // Kategori
    Route::get('/kategori/create', [KategoriController::class, 'create']);
    Route::post('/kategori', [KategoriController::class, 'store']);
    Route::get('/kategori', [KategoriController::class, 'index']);
    Route::get('/kategori/{category_id}', [KategoriController::class, 'show']);
    Route::get('/kategori/{category_id}/edit', [KategoriController::class, 'edit']);
    Route::put('/kategori/{category_id}', [KategoriController::class, 'update']);
    Route::delete('/kategori/{category_id}', [KategoriController::class, 'destroy']);

    // Profile
    Route::resource('profile', ProfileController::class)->only(['index', 'update']);

    // Pertanyaan
    Route::resource('/pertanyaan', PertanyaanController::class);

    // Jawaban
    Route::post('/jawaban/{pertanyaan_id}', [JawabanController::class, 'tambah']);
    Route::get('/jawaban/{jawaban_id}/edit', [JawabanController::class, 'edit']);
    Route::put('/jawaban/{jawaban_id}', [JawabanController::class, 'update']);
    Route::delete('/jawaban/{jawaban_id}', [JawabanController::class, 'destroy']);
});