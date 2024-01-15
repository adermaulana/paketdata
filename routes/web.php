<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserMenuController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminProdukController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminPembelianController;
use App\Http\Controllers\UserPembayaranController;
use App\Http\Controllers\AdminPembayaranController;

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

Route::get('/', function () {
    return redirect('/login');
})->middleware('guest');

Route::get('/login', function () {
    return view('login');
})->name('login')->middleware('guest');

Route::get('/admin',function(){
    return view('admin.index');
})->middleware('auth');

Route::get('/user',function(){
    return view('user.index');
})->middleware('auth:pelanggan');


//AdminKategori
Route::get('admin/kategori',[AdminCategoryController::class,'index'])->middleware('auth');;
Route::get('admin/kategori/tambah',[AdminCategoryController::class,'tambah'])->middleware('auth');;
Route::post('admin/kategori/tambah',[AdminCategoryController::class,'store']);
Route::get('admin/kategori/edit/{id}',[AdminCategoryController::class,'edit'])->middleware('auth');;
Route::put('admin/kategori/edit/{id}',[AdminCategoryController::class,'update']);
Route::delete('admin/kategori/delete/{id}',[AdminCategoryController::class,'destroy']);

//AdminProduk
Route::get('admin/produk',[AdminProdukController::class,'index'])->middleware('auth');;
Route::get('admin/produk/tambah',[AdminProdukController::class,'tambah'])->middleware('auth');;
Route::post('admin/produk/tambah',[AdminProdukController::class,'store']);
Route::get('admin/produk/edit/{id}',[AdminProdukController::class,'edit'])->middleware('auth');;
Route::put('admin/produk/edit/{id}',[AdminProdukController::class,'update']);
Route::delete('admin/produk/delete/{id}',[AdminProdukController::class,'destroy']);

//AdminPembayaran
Route::get('admin/pembayaran',[AdminPembayaranController::class,'index'])->middleware('auth');;
Route::put('admin/pembayaran/konfirmasi/{id}',[AdminPembayaranController::class,'konfirmasi']);

//AdminPembelian
Route::get('admin/pembelian',[AdminPembelianController::class,'index'])->middleware('auth');

//AdminUser
Route::get('admin/user',[AdminUserController::class,'index'])->middleware('auth');
Route::delete('admin/user/delete/{id}',[AdminUserController::class,'destroy']);

//UserMenu
Route::get('user/menu',[UserMenuController::class,'index'])->middleware('auth:pelanggan');
Route::get('user/menu/cari',[UserMenuController::class,'cari'])->middleware('auth:pelanggan');
Route::post('user/menu/bayar',[UserMenuController::class,'store'])->middleware('auth:pelanggan');

//UserPembayaran
Route::get('user/pembayaran',[UserPembayaranController::class,'index'])->middleware('auth:pelanggan');
Route::post('user/pembayaran',[UserPembayaranController::class,'store'])->middleware('auth:pelanggan');

//Login
Route::post('/login', [LoginController::class,'authenticate']);
Route::post('/logout',[LoginController::class,'logout']);
Route::post('/keluar',[LoginController::class,'keluar']);

//Registrasi
Route::get('/registrasi',[RegisterController::class,'index']);
Route::post('/registrasi',[RegisterController::class,'store']);
