<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserManagementController;

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

// wali santri route
Route::get('/home', function () {
    return view('santri.index');
});
Route::get('/topup', function () {
    return view('santri.topup.index');
});
Route::get('/topup/history', function () {
    return view('santri.topup.history');
});
// admin route
Route::get('/admin/home', function () {
    return view('admin.index');
});
Route::get('/admin/data-santri', function () {
    return view('admin.data-santri.index');
});
Route::get('/admin/data-santri/tambah', function () {
    return view('admin.data-santri.tambah');
});
Route::get('/admin/data-santri/edit', function () {
    return view('admin.data-santri.edit');
});
Route::get('/admin/data-admin', function () {
    return view('admin.data-admin.index');
});
Route::get('/admin/data-user', function () {
    return view('admin.data-user.index');
});
Route::get('/admin/data-user/pilih-role', function () {
    return view('admin.data-user.pilih-role');
});
Route::get('/admin/data-user/tambah', function () {
    return view('admin.data-user.create');
});
Route::get('/admin/report', function () {
    return view('admin.report');
});
Route::get('/admin/kelola', function () {
    return view('admin.kelola');
});
Route::get('/admin/verifikasi', function () {
    return view('admin.verifikasi.index');
});
Route::get('/', function () {
    return view('sign-in');
});

// Grup rute untuk manajemen user agar rapi
Route::prefix('admin/data-user')->name('admin.data-user.')->group(function () {
    // Halaman untuk memilih role (Santri atau Admin)
    Route::get('/pilih-role', [UserManagementController::class, 'selectRole'])->name('selectRole');

    // Halaman form untuk membuat user baru, dengan role yang sudah dipilih
    Route::get('/tambah', [UserManagementController::class, 'create'])->name('create');

    // Alamat untuk MENYIMPAN data dari form
    Route::post('/store', [UserManagementController::class, 'store'])->name('store');
});
