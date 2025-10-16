<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MataKuliahController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Di sini tempat kamu mendaftarkan semua route aplikasi web.
|
*/

Route::get('/', function () {
    return view('welcome');
});

// ====================== PROFILE ======================
Route::get('/profile/{nama}/{nim}/{kelas}', [ProfileController::class, 'profile'])->name('profile.show');

// ====================== USER ======================
Route::get('/user', [UserController::class, 'index'])->name('user.index');
Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
Route::post('/user', [UserController::class, 'store'])->name('user.store');
Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');
Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');

// ====================== MATA KULIAH ======================
Route::get('/matakuliah', [MataKuliahController::class, 'index'])->name('matakuliah.index');
Route::get('/matakuliah/create', [MataKuliahController::class, 'create'])->name('matakuliah.create');
Route::post('/matakuliah', [MataKuliahController::class, 'store'])->name('matakuliah.store');
Route::get('/matakuliah/{id}/edit', [MataKuliahController::class, 'edit'])->name('matakuliah.edit');
Route::put('/matakuliah/{id}', [MataKuliahController::class, 'update'])->name('matakuliah.update');
Route::delete('/matakuliah/{id}', [MataKuliahController::class, 'destroy'])->name('matakuliah.destroy');
