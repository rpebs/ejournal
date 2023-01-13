<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\JurnalController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PenerbitController;
use App\Models\Jurnal;
use Illuminate\Support\Facades\Route;

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


Route::get('/login', [AdminController::class, 'login'])->name('login');
Route::post('/login', [AdminController::class, 'login_action'])->name('act.login');
Route::get('/logout', [AdminController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);

    //Route Journal
    Route::get('/admin/jurnal', [JurnalController::class, 'index'])->name('data.jurnal');
    Route::post('/admin/jurnal/store', [JurnalController::class, 'store'])->name('tambah.jurnal');
    Route::get('/admin/jurnal/delete/{id}', [JurnalController::class, 'delete'])->name('hapus.jurnal');

    //Route Kategori
    Route::get('/admin/kategori', [KategoriController::class, 'index']);
    Route::post('/admin/kategori/store', [KategoriController::class, 'store'])->name('tambah.kategori');
    Route::post('/admin/kategori/edit', [KategoriController::class, 'edit'])->name('edit.kategori');
    Route::get('/admin/kategori/delete/{id}', [KategoriController::class, 'delete'])->name('hapus.kategori');

    //Route Penebrit
    Route::get('/admin/penerbit', [PenerbitController::class, 'index'])->name('data.penerbit');
    Route::post('/admin/penerbit/store', [PenerbitController::class, 'store'])->name('tambah.penerbit');
    Route::post('/admin/penerbit/edit', [PenerbitController::class, 'edit'])->name('edit.penerbit');
    Route::get('/admin/penerbit/delete/{id}', [PenerbitController::class, 'delete']);
});
