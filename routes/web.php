<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CekLoginMiddleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Auth
Route::get('/', function () {
    return view('auth/login');
})->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('proseslogin');

Route::middleware([CekLoginMiddleware::class])->group(function () {
    
    //Data Siswa
    Route::get('/siswa/add', function () {
        return view('data_siswa/tambah_siswa');
    })->name('siswa.tambah');
    Route::post('/siswa/add/proses', [SiswaController::class, 'tambahSiswa'])->name('siswa.tambah.proses');

    //Data Guru
    Route::get('/guru/add', function () {
        return view('data_guru/tambah_guru');
    })->name('guru.tambah');
    Route::post('/guru/add/proses', [GuruController::class, 'tambahGuru'])->name('guru.tambah.proses');

    //Data Satpam
    Route::get('/satpam/add', function () {
        return view('data_satpam/tambah_satpam');
    })->name('satpam.tambah');
    Route::post('/satpam/add/proses', [SatpamController::class, 'tambahSatpam'])->name('satpam.tambah.proses');
    

    //Form Berkunjung
    Route::get('/berkunjung/add', function () {
        return view('form_berkunjung/form_input');
    });

    //Logout
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
