<?php

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
Auth::routes();
Route::get('/', function () {
    return view('auth.login');
})->name('login');


Route::get('/log-in', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('_login');
Route::post('/log-in-post', [App\Http\Controllers\Auth\LoginController::class, 'posts'])->name('_postlogin');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('_logout');

Route::get('/kontrak-baru',[KontrakBaruController::class, 'index'])->name('_kontrak-baru');


//-----------------------------------Repeat Order------------------------------------------
Route::get('/repeat-order',[RepeatOrderController::class, 'index'])->name('_repeat-order');
Route::get('/repeat-order-sync',[RepeatOrderController::class, 'sync'])->name('_repeat-order-sync');

