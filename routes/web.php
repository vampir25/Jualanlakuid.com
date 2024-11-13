<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Transaksicontroller;
use App\Http\Controllers\TransaksiAdminController;

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

Route::GET('/',[TransaksiController::class, 'index'])->name(name: 'Home');
Route::POST('/addTocart', [TransaksiController::class, 'addTocart'])->name(name: 'addTocart');
Route::POST('/storePelanggan', [UserController::class, 'storePelanggan'])->name('storePelanggan');
Route::POST('/login_pelanggan', [UserController::class, 'loginProses'])->name('loginproses.pelanggan');
Route::GET('/logout_pelanggan', [UserController::class, 'logout'])->name('logout.pelanggan');

Route::GET('/shop', [Controller::class, 'shop'])->name('shop');
Route::GET('/transaksi', [Controller::class, 'transaksi'])->name('transaksi');
Route::GET('/contact', [Controller::class, 'contact'])->name('Contact');

Route::GET('/checkout', [Controller::class, 'checkout'])->name('checkout');
Route::POST('/checkout/proses/{id}', [Controller::class, 'prosesCheckout'])->name('checkout.product');
Route::POST('/checkout/prosesPembayaran', [Controller::class, 'prosesPembayaran'])->name('checkout.bayar');
Route::GET('/checkOut', [Controller::class, 'keranjang'])->name('keranjang');
Route::GET('/checkOut/{id}', [Controller::class, 'bayar'])->name('keranjang.bayar');

Route::GET('/admin', [Controller::class, 'login'])->name('login');
Route::POST('/admin/loginProses', [Controller::class, 'loginProses'])->name('loginProses');

Route::group(['Middleware' => ['admin']], function () {
    Route::GET('/admin/dashboard', [Controller::class, 'admin'])->name('dashboard');
    Route::GET('/admin/logout', [Controller::class, 'logout'])->name('logout');
    Route::GET('/admin/product', [ProductController::class, 'index'])->name('product');
    Route::GET('/admin/addModal', [ProductController::class, 'addModal'])->name('addModal');
    Route::GET('/admin/report', [Controller::class, 'report'])->name('report');

    Route::GET('/admin/user_management', [UserController::class, 'index'])->name('userManagement');
    Route::GET('/admin/user_management/addModalUser', [UserController::class, 'addModalUser'])->name('addModalUser');
    Route::POST('/admin/user_management/addData', [UserController::class, 'store'])->name('addDataUser');
    Route::GET('/admin/user_management/editUser/{id}', [UserController::class, 'show'])->name('showDataUser');
    Route::PUT('/admin/user_management/updateDataUser/{id}', [UserController::class, 'update'])->name('updateDataUSer');
    Route::DELETE('/admin/user_management/deleteUSer/{id}', [UserController::class, 'destroy'])->name('destroyDataUser');


    Route::POST('/admin/addData', [ProductController::class, 'store'])->name('addData');
    Route::GET('/admin/editModal/{id}', [ProductController::class, 'show'])->name('editModal');
    Route::PUT('/admin/updateData/{id}', [ProductController::class, 'update'])->name('updateData');
    Route::DELETE('/admin/deleteData/{id}', [ProductController::class, 'destroy'])->name('deleteData');

    Route::GET('/admin/transaksi', action: [TransaksiAdminController::class, 'index'])->name('transaksi.admin');
});

