<?php

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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/admin/home', function () {
    return view('admin.index');
})->name('home.admin');

Route::middleware('auth')->group(function () {
    // wali santri route
    Route::get('/home', function () {
        return view('santri.index');
    })->name('home.santri');
    Route::get('/topup', function () {
        return view('santri.topup.index');
    });
    Route::get('/topup/history', function () {
        return view('santri.topup.history');
    });

    // admin route
    Route::get('/admin/home', function () {
        return view('admin.index');
    })->name('home.admin');
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
        return view('admin.data-user.create')->name('admin.users.create');
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
});

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__ . '/auth.php';
