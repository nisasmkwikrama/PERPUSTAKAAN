<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PeminjamController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::prefix('/Buku')->name('buku.')->group(function () {
    Route::get('/', [BukuController::class, 'index'])->name('index');
    Route::get('/create', [BukuController::class, 'create'])->name('create');
    Route::post('/store', [BukuController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [BukuController::class, 'edit'])->name('edit');
    Route::patch('/update/{id}', [BukuController::class, 'update'])->name('update');
    Route::delete('/destroy/{id}', [BukuController::class, 'destroy'])->name('destroy');
});
Route::prefix('/Peminjam')->name('peminjam.')->group(function () {
    Route::get('/', [PeminjamController::class, 'index'])->name('index');
    Route::get('/create', [PeminjamController::class, 'create'])->name('create');
    Route::post('/store', [PeminjamController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [PeminjamController::class, 'edit'])->name('edit');
    Route::patch('/update/{id}', [PeminjamController::class, 'update'])->name('update');
    Route::delete('/destroy/{id}', [PeminjamController::class, 'destroy'])->name('destroy');
});
