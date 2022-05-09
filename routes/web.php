<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PerjalananController;
use App\Http\Controllers\UserController;
use App\Models\User;
use App\Models\Perjalanan;
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
    // PRINT DATA PDF PERJALANAN
    Route::get('/cetak_PDF', [PerjalananController::class, 'print_PDF'])->name('print_PDF');


    // Menampilkan data User
    Route::get('/user', [UserController::class, 'index'])->name('userIndex');
    // Menghapus Data User
    Route::get('/deleteUser/{id}', [UserController::class, 'deleteUser'])->name('deleteUser');


    // Menampilkan,mengedit, menghapus data user sebagai user
    Route::get('/user/profile', [UserController::class, 'profile'])->name('profile');
    Route::get('/user/profile/{id}', [UserController::class, 'editProfile']);
    Route::post('/user/profile/updateData/{id}', [UserController::class, 'updateData']);


    // Menambahkan data perjalanan
    Route::get('/form', [PerjalananController::class, 'form'])->name('form');
    // Menambah data dengan method post
    Route::post('/formPost', [PerjalananController::class, 'formPost']);
});
