<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PerjalananController;
use App\Http\Controllers\UserController;
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

Route::get('/', [UserController::class, 'login'])->name('login');
Route::post('/loginPost', [UserController::class, 'loginPost']);
Route::any('/logout', [UserController::class, 'logout']);

Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/registerPost', [UserController::class, 'registerPost']);

// Harus login/Register sebelum bisa masuk ke halaman Dashboard 
Route::group(['middleware' => ['auth', 'Role:admin,user']], function () {
    Route::get('/dashboard', [PerjalananController::class, 'index'])->name('dashboard');
    // Menampilkan data berdasarkan ID
    Route::get('/dashboard/{id}', [PerjalananController::class, 'tampilData'])->name('tampilData');
    // Mengedit data dengan cara mengupdate
    Route::post('/updateData/{id}', [PerjalananController::class, 'updateData'])->name('updateData');
    Route::get('/delete/{id}', [PerjalananController::class, 'deleteData'])->name('deleteData');



    // Menampilkan data User
    Route::get('/user', [UserController::class, 'index'])->name('userIndex');

    // Menambahkan data perjalanan
    Route::get('/form', [PerjalananController::class, 'form'])->name('form');
    // Menambah data dengan method post
    Route::post('/formPost', [PerjalananController::class, 'formPost']);
});
