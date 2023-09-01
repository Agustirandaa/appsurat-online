<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GalleryController\GallerySuratMasukController;
use App\Http\Controllers\LaporanController\LaporanSuratMasukController;
use App\Http\Controllers\GalleryController\GallerySuratKeluarController;
use App\Http\Controllers\LaporanController\LaporanSuratDisetujuiController;
use App\Http\Controllers\LaporanController\LaporanSuratDisposisiController;
use App\Http\Controllers\LaporanController\LaporanSuratKeluarController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TransaksiController\TransaksiSuratMasukController;
use App\Http\Controllers\TransaksiController\TransaksiSuratKeluarController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ViewPDFController;

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
    return redirect('/dashboard');
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/get-data-by-month-and-year/{bulan}/{tahun}', [DashboardController::class, 'getDataByMonthadnYear']);

// Role Pengaturan
Route::resource('/dashboard/pengaturan', UserController::class)->except('show')->middleware('is_admin');

// Transaksi Surat
Route::resource('/transaksi/surat-masuk', TransaksiSuratMasukController::class)->middleware('is_admin');
Route::resource('/transaksi/surat-keluar', TransaksiSuratKeluarController::class)->middleware('is_admin');

// Laporan Surat
Route::resource('/laporan/surat-masuk', LaporanSuratMasukController::class)->only(['index', 'show', 'edit', 'update'])->middleware('auth');
Route::resource('/laporan/surat-keluar', LaporanSuratKeluarController::class)->only(['index', 'edit', 'update', 'show'])->middleware('auth');
Route::resource('/laporan/surat-disposisi', LaporanSuratDisposisiController::class)->only('index')->middleware('auth');
Route::resource('/laporan/surat-disetujui', LaporanSuratDisetujuiController::class)->only('index')->middleware('auth');

// gallery Surat
Route::resource('/gallery/surat-masuk', GallerySuratMasukController::class)->only(['index', 'show'])->middleware('auth');
Route::resource('/gallery/surat-keluar', GallerySuratKeluarController::class)->only('index')->middleware('auth');


// User profile
Route::get('/dashboard/userprofile', [UserProfileController::class, 'index'])->name('userprofile');
Route::get('/dashboard/userprofile/{id}', [UserProfileController::class, 'edit'])->name('edit');
Route::put('/dashboard/userprofile/{id}', [UserProfileController::class, 'update'])->name('updateuserprofile');

// User edit password
Route::get('/dashboard/setpassword', [UserProfileController::class, 'setpassword'])->name('setpassword');
Route::put('/dashboard/setpassword/{id}', [UserProfileController::class, 'updatepassword'])->name('updatepassword');




// Route untuk menangani aksi edit surat di menu transaksi surat
Route::get('/transaksi/surat-keluar/{slug}/{jenis}/{status}/edit', [TransaksiSuratKeluarController::class, 'edit'])->name('edit-surat-keluar')->middleware('auth');

// Route untuk menangani aksi setujui surat di menu laporan surat
Route::get('/laporan/surat-keluar/{jenis}/{slug}/edit', [LaporanSuratKeluarController::class, 'edit'])->name('edit-laporan-surat-keluar')->middleware('auth');

// Route untuk menangani aksi detail surat keluar
Route::get('/laporan/surat-keluar/{slug}/{jenis}/{status}', [LaporanSuratKeluarController::class, 'show'])->name('show-detail-laporan')->middleware('auth');


// Check Slug
Route::get('/transaksi/suratmasuk/checkSlug', [TransaksiSuratMasukController::class, 'checkSlug']);
Route::get('/transaksi/suratkeluar/checkSlug', [TransaksiSuratKeluarController::class, 'checkSlug']);

// view PDF
Route::get('/view-pdf/{slug}/{jenis}/{status}', [ViewPDFController::class, 'viewPDF'])->name('viewpdf');
Route::get('/print-pdf/laporan-surat-masuk', [ViewPDFController::class, 'printSuratMasuk'])->name('printSuratMasuk');
Route::get('/print-pdf/laporan-surat-keluar', [ViewPDFController::class, 'printSuratKeluar'])->name('printsuratkeluar');
