<?php

use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminPekerjaanController;
use App\Http\Controllers\Admin\AdminPelatihanController;
use App\Http\Controllers\Admin\AdminPendidikanController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\UserDataDiriController;
use App\Http\Controllers\User\UserHomeController;
use App\Http\Controllers\User\UserPekerjaanController;
use App\Http\Controllers\User\UserPelatihanController;
use App\Http\Controllers\User\UserPendidikanTerakhirController;
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
   return view('auth.login');
})
->middleware('guest');

Auth::routes();

Route::middleware(['auth', 'user-access:user'])->group(function () {

    Route::get('/user/home', [UserHomeController::class, 'index'])->name('user.home');

    Route::get('/user/datadiri', [UserDataDiriController::class, 'index'])->name('user.data_diri');
    Route::post('/user/datadiri', [UserDataDiriController::class, 'store'])->name('user.data_diri.store');

    Route::resource('/user/pendidikan', UserPendidikanTerakhirController::class);
    Route::resource('/user/pelatihan', UserPelatihanController::class);
    Route::resource('/user/pekerjaan', UserPekerjaanController::class);
});

Route::middleware(['auth', 'user-access:admin'])->group(function () {

    Route::get('/admin/home', [AdminHomeController::class, 'index'])->name('admin.home');
    Route::get('/admin/cari', [AdminHomeController::class, 'cari'])->name('admin.cari');

    Route::get('/admin/detail/pegawai/{id}', [AdminHomeController::class, 'detail_pegawai'])->name('admin.detail');
    Route::get('/admin/edit/pegawai/{id}', [AdminHomeController::class, 'edit_pegawai'])->name('admin.edit');
    Route::put('/admin/edit/pegawai/{id}', [AdminHomeController::class, 'update_pegawai'])->name('admin.update');
    Route::get('/admin/delete/pegawai/{id}', [AdminHomeController::class, 'delete_pegawai'])->name('admin.delete');

    Route::get('/admin/pendidikan/edit/{user}', [AdminPendidikanController::class, 'edit'])->name('admin.pendidikan.edit');
    Route::put('/admin/pendidikan/edit/{user}', [AdminPendidikanController::class, 'update'])->name('admin.pendidikan.update');

    Route::get('/admin/pelatihan/edit/{user}', [AdminPelatihanController::class, 'edit'])->name('admin.pelatihan.edit');
    Route::put('/admin/pelatihan/edit/{user}', [AdminPelatihanController::class, 'update'])->name('admin.pelatihan.update');

    Route::get('/admin/pekerjaan/edit/{user}', [AdminPekerjaanController::class, 'edit'])->name('admin.pekerjaan.edit');
    Route::put('/admin/pekerjaan/edit/{user}', [AdminPekerjaanController::class, 'update'])->name('admin.pekerjaan.update');
});
