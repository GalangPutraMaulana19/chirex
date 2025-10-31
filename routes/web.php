<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PenyakitController;
use App\Http\Controllers\GejalaController;
use App\Http\Controllers\PengetahuanController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\DiagnosaController;
use App\Http\Controllers\RiwayatController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/bantuan', [HomeController::class, 'bantuan'])->name('bantuan');
Route::get('/tentang', [HomeController::class, 'tentang'])->name('tentang');
Route::get('/keterangan', [HomeController::class, 'keterangan'])->name('keterangan');
Route::get('/harga', [HomeController::class, 'harga'])->name('harga');

// Authentication routes
Route::get('/formlogin', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Diagnosa routes (public)
Route::get('/diagnosa', [DiagnosaController::class, 'index'])->name('diagnosa');
Route::post('/diagnosa/proses', [DiagnosaController::class, 'proses'])->name('diagnosa.proses');

// Riwayat routes (public)
Route::get('/riwayat', [RiwayatController::class, 'index'])->name('riwayat');
Route::get('/riwayat-detail/{id}', [RiwayatController::class, 'detail'])->name('riwayat.detail');

// Contact form
Route::post('/kirim-form', [HomeController::class, 'kirimForm'])->name('kirim.form');

// Admin routes (protected)
Route::middleware(['auth'])->group(function () {
    // Admin management
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::post('/admin/store', [AdminController::class, 'store'])->name('admin.store');
    Route::post('/admin/update/{username}', [AdminController::class, 'update'])->name('admin.update');
    Route::delete('/admin/delete/{username}', [AdminController::class, 'destroy'])->name('admin.delete');
    
    // Penyakit management
    Route::get('/penyakit', [PenyakitController::class, 'index'])->name('penyakit.index');
    Route::post('/penyakit/store', [PenyakitController::class, 'store'])->name('penyakit.store');
    Route::post('/penyakit/update/{id}', [PenyakitController::class, 'update'])->name('penyakit.update');
    Route::delete('/penyakit/delete/{id}', [PenyakitController::class, 'destroy'])->name('penyakit.delete');
    
    // Gejala management
    Route::get('/gejala', [GejalaController::class, 'index'])->name('gejala.index');
    Route::post('/gejala/store', [GejalaController::class, 'store'])->name('gejala.store');
    Route::post('/gejala/update/{id}', [GejalaController::class, 'update'])->name('gejala.update');
    Route::delete('/gejala/delete/{id}', [GejalaController::class, 'destroy'])->name('gejala.delete');
    
    // Pengetahuan management
    Route::get('/pengetahuan', [PengetahuanController::class, 'index'])->name('pengetahuan.index');
    Route::post('/pengetahuan/store', [PengetahuanController::class, 'store'])->name('pengetahuan.store');
    Route::post('/pengetahuan/update/{id}', [PengetahuanController::class, 'update'])->name('pengetahuan.update');
    Route::delete('/pengetahuan/delete/{id}', [PengetahuanController::class, 'destroy'])->name('pengetahuan.delete');
    
    // Post management
    Route::get('/post', [PostController::class, 'index'])->name('post.index');
    Route::post('/post/store', [PostController::class, 'store'])->name('post.store');
    Route::post('/post/update/{id}', [PostController::class, 'update'])->name('post.update');
    Route::delete('/post/delete/{id}', [PostController::class, 'destroy'])->name('post.delete');
    
    // Password management
    Route::get('/password', [AuthController::class, 'showPasswordForm'])->name('password.form');
    Route::post('/password/update', [AuthController::class, 'updatePassword'])->name('password.update');
});
