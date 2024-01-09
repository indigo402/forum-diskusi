<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PertanyaanController;
use App\Http\Controllers\JawabanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TinyMCEController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'home']);

Route::middleware('auth')->group(function () {
    //Create
    //Form Tambah Kategori
    Route::get('/kategori/create', [KategoriController::class, 'create']);
    //Untuk kirim data ke database atau tambah data ke database
    Route::post('/kategori', [KategoriController::class, 'store']);

    //Read
    //Menampilkan data
    Route::get('/kategori', [KategoriController::class, 'index']);
    //Detail Cast berdasarkan id
    Route::get('/kategori/{category_id}', [KategoriController::class, 'show']);

    // Edit Kategori
    Route::get('/kategori/{category_id}/edit', [KategoriController::class, 'edit']);
    //Update Kategori
    Route::put('/kategori/{category_id}', [KategoriController::class, 'update']);
    // Delete Kategori
    Route::delete('/kategori/{category_id}', [KategoriController::class, 'destroy']);

    //Profile
    Route::resource('profile', ProfileController::class)->only(['index', 'update']);
});

//CRUD Pertanyaan
Route::resource('/pertanyaan', PertanyaanController::class);

//CRUD Jawaban
// Tambah Jawaban
Route::post('/jawaban/{pertanyaan_id}', [JawabanController::class, 'tambah']);
// Edit Jawaban
Route::get('/jawaban/{jawaban_id}/edit', [JawabanController::class, 'edit']);
//Update Jawaban
Route::put('/jawaban/{jawaban_id}', [JawabanController::class, 'update']);
// Delete Jawaban
Route::delete('/jawaban/{jawaban_id}', [JawabanController::class, 'destroy']);

// CRUD Login
Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
