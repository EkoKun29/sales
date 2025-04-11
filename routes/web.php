<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KontrakBaruController;
use App\Http\Controllers\RepeatOrderController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
Route::get('/',[LoginController::class, 'index'])->name('login');

Auth::routes();
Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'create'])->name('_register');
Route::post('/input-register', [App\Http\Controllers\Auth\RegisterController::class, 'store'])->name('_postRegister');

Route::get('/log-in', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('_login');
Route::post('/log-in-post', [App\Http\Controllers\Auth\LoginController::class, 'posts'])->name('_postlogin');

//-------------------------------------------HomeApiMSK----------------------------------
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home/msk-sync',[HomeController::class, 'sync'])->name('_repeat-order-sync');

Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');






