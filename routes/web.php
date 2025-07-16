<?php

use App\Http\Controllers\Admin\DataAdminController;
use App\Http\Controllers\Admin\DataSantriController;
use App\Http\Controllers\Admin\TopUpController;
use App\Http\Controllers\Admin\TransaksiController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\SaldoController;
use App\Http\Controllers\ProfileController;
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

Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return redirect('login');
    });
});


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // wali santri route
    Route::get('/home', function () {
        return view('santri.index');
    })->name('home.santri');

    // Top Up Route
    Route::get('/santri/topup', [TopUpController::class, 'index'])->name('santri.topup.index');
    Route::post('/santri/topup', [TopUpController::class, 'store'])->name('santri.topup.store');
    Route::get('/santri/topup/history', [TopUpController::class, 'riwayatTopup'])->name('santri.topup.history');
    Route::get('/admin/verifikasi', [TopUpController::class, 'indexAdmin'])->name('admin.verifikasi.index');
    Route::put('/admin/verifikasi/{topup}/approve', [TopUpController::class, 'approve'])->name('admin.verifikasi.approve');
    Route::put('/admin/verifikasi/{topup}/reject', [TopUpController::class, 'reject'])->name('admin.verifikasi.reject');
    // Route::get('/topup', function () {
    //     return view('santri.topup.index');
    // });
    // Route::get('/topup/history', function () {
    //     return view('santri.topup.history');
    // });

    // data admin route
    Route::get('/admin/data-admin', [DataAdminController::class, 'index'])->name('admin.data-admin.index');
    Route::get('/admin/data-admin/create', [DataAdminController::class, 'create'])->name('admin.data-admin.create');
    Route::post('/admin/data-admin/create', [DataAdminController::class, 'store'])->name('admin.data-admin.store');
    Route::get('/admin/data-admin/edit/{id}', [DataAdminController::class, 'edit'])->name('admin.data-admin.edit');
    Route::post('/admin/data-admin/edit/{id}', [DataAdminController::class, 'update'])->name('admin.data-admin.update');

    // data santri route
    Route::get('/admin/data-santri', [DataSantriController::class, 'index'])->name('admin.data-santri.index');
    Route::get('/admin/data-santri/create', [DataSantriController::class, 'create'])->name('admin.data-santri.create');
    Route::post('/admin/data-santri/create', [DataSantriController::class, 'store'])->name('admin.data-santri.store');
    Route::get('/admin/data-santri/edit/{id}', [DataSantriController::class, 'edit'])->name('admin.data-santri.edit');
    Route::post('/admin/data-santri/edit/{id}', [DataSantriController::class, 'update'])->name('admin.data-santri.update');

    // TRANSAKSI: Setor & Tarik
    Route::post('/admin/transaksi', [TransaksiController::class, 'proses'])->name('admin.transaksi.proses');

    // kelola saldo route
    Route::get('/admin/kelola', [TransaksiController::class, 'index'])->name('admin.kelola');

    // report
    Route::get('/admin/report', [TransaksiController::class, 'report'])->name('admin.report');

    // route dashboard
    Route::get('/admin/home', [DashboardController::class, 'index'])->name('admin.dashboard');

    // Index Saldo
    Route::get('/admin/data-saldo', [SaldoController::class, 'index'])->name('admin.data-saldo.index');

    // Detail Saldo per Santri
    Route::get('/admin/data-saldo/{id}', [SaldoController::class, 'show'])->name('admin.data-saldo.show');


    // home admin route
    // Route::get('/admin/home', function () {
    //     return view('admin.index');
    // })->name('home.admin');
    // Route::get('/admin/data-santri', function () {
    //     return view('admin.data-santri.index');
    // });
    // Route::get('/admin/data-santri/tambah', function () {
    //     return view('admin.data-santri.tambah');
    // });
    // Route::get('/admin/data-santri/edit', function () {
    //     return view('admin.data-santri.edit');
    // });
    // Route::get('/admin/data-admin', function () {
    //     return view('admin.data-admin.index');
    // });
    Route::get('/admin/data-user', function () {
        return view('admin.data-user.index');
    });
    Route::get('/admin/data-user/pilih-role', function () {
        return view('admin.data-user.pilih-role');
    });
    Route::get('/admin/data-user/tambah', function () {
        return view('admin.data-user.create')->name('admin.users.create');
    });
    // Route::get('/admin/report', function () {
    //     return view('admin.report');
    // });

    // Route::get('/admin/verifikasi', function () {
    //     return view('admin.verifikasi.index');
    // });
});

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__ . '/auth.php';
