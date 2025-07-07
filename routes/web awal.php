<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\SantriController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminController;

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

Route::get('/', function () {
    // Jika sudah login, arahkan ke dashboard, jika belum, ke halaman login
    if (auth()->check()) {
        if (auth()->user()->role_id == 1) return redirect('/admin/dashboard');
        if (auth()->user()->role_id == 2) return redirect('/santri/dashboard');
    }
    return redirect()->route('login');
});

// === RUTE AUTENTIKASI ===
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// === RUTE YANG DILINDUNGI (HARUS LOGIN) ===
Route::middleware(['auth'])->group(function () {

    // Grup Rute untuk Admin
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

        // Rute CRUD Santri
        Route::resource('data-santri', SantriController::class)->except(['create', 'store', 'show']);

        // Rute Tambah User
        Route::prefix('users')->name('users.')->group(function () {
            Route::get('/pilih-role', [UserManagementController::class, 'pilihRole'])->name('pilihRole');
            Route::get('/create', [UserManagementController::class, 'create'])->name('create');
            Route::post('/store', [UserManagementController::class, 'store'])->name('store');
        });
    });

    // Grup Rute untuk Santri
    Route::prefix('santri')->name('santri.')->group(function () {
        Route::get('/dashboard', [SantriController::class, 'index'])->name('dashboard');
        // Tambahkan rute-rute lain untuk santri di sini
    });
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

Route::resource('admin/data-santri', SantriController::class)->except(['create', 'store', 'show']);
