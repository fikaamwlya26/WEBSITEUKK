<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\User1Controller;


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


Route::get('/', [User1Controller::class, 'index'])->name('user1.index');
Route::get('/produk', [User1Controller::class, 'product'])->name('user1.product');
Route::get('/produk/{id}', [User1Controller::class, 'show'])->name('user1.detail');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard')->middleware('auth');


Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'login'])->name('logout');
Route::post('/login', [AuthController::class, 'loginAksi'])->name('login.aksi');

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerSimpan'])->name('register.simpan');
Route::get('/forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'sendResetLink'])->name('password.email');

Route::get('/reset-password/{token}', [AuthController::class, 'showResetPasswordForm'])->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'updatePassword'])->name('password.update');

Route::resource('product', ProductController::class);
Route::get('/product/print', [ProductController::class, 'print'])->name('product.print');


