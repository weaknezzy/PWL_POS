<?php

use App\Http\Controllers\Kategori;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\POSController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/level', [LevelController::class,'index']);
Route::get('/level/tambah', [LevelController::class,'tambah'])->name('level.level_tambah');
Route::post('/level/tambah_simpan',[LevelController::class,'store'])->name('level.level_simpan');

Route::get('/kategori', [KategoriController::class, 'index']);
Route::get('/kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
Route::post('/kategori',[KategoriController::class, 'store'])->name('kategori');

// Route::get('/user', [UserController::class,'index']);
Route::get('/user', [UserController::class,'index'])->name('user.index');
Route::get('/user/tambah', [UserController::class,'tambah'])->name('user.tambah');
Route::post('/user/tambah_simpan',[UserController::class,'tambah_simpan'])->name('user.tambah_simpan');



Route::get('/kategori/edit/{id}', [KategoriController::class, 'edit'])->name('kategori.edit');
Route::put('/kategori/update/{id}', [KategoriController::class, 'update'])->name('kategori.update');
Route::get('/kategori/delete/{id}', [KategoriController::class, 'delete'])->name('kategori.delete');

Route::resource('m_user', POSController::class);
Route::get('/', [WelcomeController::class,'index']);