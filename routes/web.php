<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PelamarController;
use App\Http\Controllers\UniversitasController;
use App\Http\Controllers\LowonganController;    
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PengalamanKerjaController;
use App\Http\Controllers\PendidikanController;
use App\Http\Controllers\CVController;
use App\Http\Controllers\LamaranController;
use App\Models\Lamaran;
use App\Models\Lowongan;

// =========== Router Login dan Logout Pelamar Start ================

Route::get('/', fn() => redirect('/login'));
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/logout', function () {
    session()->flush();
    return redirect('/login')->with('message', 'Logout berhasil');
});

Route::get('/register-pelamar', [AuthController::class, 'showRegisterFormPelamar'])->name('register-pelamar.form');
Route::post('/register-pelamar', [AuthController::class, 'registerPelamar'])->name('register-pelamar');

// =========== Router Login dan Logout Pelamar End ================

// =========== Router Fungsi Pelamar Start =================

Route::middleware('pelamar')->group(function () {
    Route::get('/home-pelamar', [PelamarController::class, 'home'])->name('home-pelamar');
    Route::get('/lowongan-pelamar', [PelamarController::class, 'lowongan'])->name('lowongan-pelamar');
    Route::get('/universitas-pelamar', [PelamarController::class, 'universitas'])->name('universitas-pelamar');
    Route::get('/profile-pelamar', [PelamarController::class, 'profilePelamar'])->name('profile-pelamar');
    Route::get('/edit-pelamar', [PelamarController::class, 'edit'])->name('edit-pelamar');
    Route::post('/update-pelamar', [PelamarController::class, 'update'])->name('update-pelamar');
    Route::prefix('pengalaman')->name('pengalaman.')->group(function () {
        Route::get('tambah', [PengalamanKerjaController::class, 'tambah'])->name('tambah');
        Route::post('store', [PengalamanKerjaController::class, 'store'])->name('store');
        Route::get('{id}/edit', [PengalamanKerjaController::class, 'edit'])->name('edit');
        Route::put('{id}/update', [PengalamanKerjaController::class, 'update'])->name('update');
        Route::delete('{id}/hapus', [PengalamanKerjaController::class, 'hapus'])->name('hapus');
    });
    Route::prefix('pendidikan')->name('pendidikan.')->group(function () {
        Route::get('tambah', [PendidikanController::class, 'tambah'])->name('tambah');
        Route::post('store', [PendidikanController::class, 'store'])->name('store');
        Route::get('{id}/edit', [PendidikanController::class, 'edit'])->name('edit');
        Route::put('{id}/update', [PendidikanController::class, 'update'])->name('update');
        Route::delete('{id}/hapus', [PendidikanController::class, 'hapus'])->name('hapus');
    });
    Route::get('/cv/template', [CVController::class, 'previewCV'])->name('cv.preview');
    Route::get('/cv/download', [CVController::class, 'download'])->name('cv.download');
    Route::post('/cv/upload', [CVController::class, 'upload'])->name('cv.upload');
    Route::delete('/cv/delete', [CVController::class, 'delete'])->name('cv.delete');
    Route::delete('/hapus-notifikasi/{id}', [AuthController::class, 'hapusNotifikasi']); 
});
    // =========== Router Fungsi Pelamar End =================


// ========== Router Login dan Logout Universitas Start ==========

Route::get('/login-universitas', [AuthController::class, 'showLoginUniversitas'])->name('login-universitas');
Route::post('/login-universitas', [AuthController::class, 'loginUniversitas']);
Route::get('/logout-universitas', function () {
    Session::forget('universitas'); // hanya hapus session universitas
    Session::regenerate(); // regenerasi session ID demi keamanan
    return redirect('/login-universitas')->with('message', 'Logout berhasil');
});
Route::get('/register-universitas', [AuthController::class, 'showRegisterForm'])->name('register-universitas.form');
Route::post('/register-universitas', [AuthController::class, 'register'])->name('register-universitas');

// ========== Router Login dan Logout Universitas End ==========


//========== Router Fungsi Universitas Start ============

Route::middleware('universitas')->group(function () {
    Route::get('/home-universitas', [UniversitasController::class, 'home'])->name('home-universitas');
    Route::get('/tentang-universitas', [UniversitasController::class, 'tentangUniversitas'])->name('tentang-universitas');
    Route::get('/edit-profile', [UniversitasController::class, 'edit'])->name('edit-profile');
    Route::post('/update-profile', [UniversitasController::class, 'update'])->name('update-profile');
    Route::get('/list-pelamar', [UniversitasController::class, 'lihatPelamarSession']);
    Route::post('/list-pelamar/{id}', [LamaranController::class, 'melamar'])->name('lamar.lowongan');
    Route::get('/list-karyawan', [UniversitasController::class, 'lihatKaryawan']);
    Route::post('/lamaran/terima/{id}', [UniversitasController::class, 'terimaLamaran']);
    Route::post('/lamaran/tolak/{id}', [UniversitasController::class, 'tolakLamaran']);
    Route::get('/list-lowongan', [LowonganController::class, 'index'])->name('list-lowongan');
    Route::get('/lowongan/tambah', [LowonganController::class, 'tambah'])->name('lowongan.tambah');
    Route::post('/lowongan/store', [LowonganController::class, 'store'])->name('lowongan.store');
    Route::get('/lowongan/{id}/edit', [LowonganController::class, 'edit'])->name('lowongan.edit');
    Route::post('/lowongan/{id}/update', [LowonganController::class, 'update'])->name('lowongan.update');
    Route::delete('/lowongan/{id}/hapus', [LowonganController::class, 'hapus'])->name('lowongan.hapus');
});

//========== Router Fungsi Universitas End ============


// ========== Router Fungsi Admin Start ============

Route::middleware('admin')->group(function () {
    Route::get('/admin-home', [AdminController::class, 'index'])->name('admin-home');
    Route::get('/logout-admin', function () {
        session()->flush();
        return redirect('/login')->with('message', 'Logout berhasil');
    });
    Route::delete('/hapus-universitas/{id}', [AdminController::class, 'hapusUniversitas'])->name('universitas.hapus');
    Route::delete('/hapus-pelamar/{id}', [AdminController::class, 'hapus'])->name('pelamar.hapus');
    Route::post('/admin/konfirmasi-pelamar/{id}', [AdminController::class, 'konfirmasiPelamar'])->name('admin.konfirmasi');
    Route::post('/admin/konfirmasi-universitas/{id}', [AdminController::class, 'konfirmasiUniversitas'])->name('admin.konfirmasiUniversitas');
    Route::post('/admin/tolak/{id}', [AdminController::class, 'tolakPelamar'])->name('admin.tolak');
    Route::post('/admin/tolak-universitas/{id}', [AdminController::class, 'tolakUniversitas'])->name('admin.tolakUniversitas');
});

// ========== Router Fungsi Admin End ============




