<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\AdminBeritaController;

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
Route::get('/blog/{slug}',[HomeController::class,'show'])->name('blog.show');

Route::get('/admin/berita',[AdminBeritaController::class,'index'])->name('admin.index')->middleware('is_admin');
Route::get('/admin/add-berita',[AdminBeritaController::class,'create'])->name('admin.create')->middleware('is_admin');
Route::post('/admin/add-berita',[AdminBeritaController::class,'store'])->name('admin.store')->middleware('is_admin');
Route::get('/admin/berita/{slug}',[AdminBeritaController::class,'show'])->name('admin.show')->middleware('is_admin');
Route::get('/admin/edit-berita/{slug}',[AdminBeritaController::class,'edit'])->name('admin.edit')->middleware('is_admin');
Route::put('/admin/update-berita/{slug}',[AdminBeritaController::class,'update'])->name('admin.update')->middleware('is_admin');
Route::delete('/admin/delete-berita/{slug}',[AdminBeritaController::class,'destroy'])->name('admin.destroy')->middleware('is_admin');

Route::post('/upload', [AdminBeritaController::class, 'upload'])->name('your-upload-route');