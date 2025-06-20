<?php

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

Route::get('/admin/home', function () {
    return view('admin.index');
});
Route::get('/home', function () {
    return view('santri.index');
});
Route::get('/admin/data-santri', function () {
    return view('admin.data-santri.index');
});
Route::get('/admin/data-santri/edit', function () {
    return view('admin.data-santri.edit');
});
Route::get('/admin/report', function () {
    return view('admin.report');
});
Route::get('/admin/kelola', function () {
    return view('admin.kelola');
});
Route::get('/', function () {
    return view('sign-in');
});
Route::get('/sign-up', function () {
    return view('sign-up');
});
