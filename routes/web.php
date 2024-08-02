<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrasiController;
use Cron\HoursField;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[HomeController::class,'index'])->name('home.index');

Route::get('/register',[RegistrasiController::class,'create'])->name('registrasi.index');
Route::post('/registrasi',[RegistrasiController::class,'store'])->name('registrasi.store');
Route::get('/login',[LoginController::class, 'create'])->name('login.index');
Route::post('/login',[LoginController::class,'store'])->name('login.store');