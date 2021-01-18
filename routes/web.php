<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BerkunjungController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SatpamController;
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
    //Profi;e
    Route::get('/profile', [AuthController::class, 'profile'])->name('profile');

    //Data Siswa
    Route::get('/siswa', [SiswaController::class, 'listSiswa'])->name('siswa.list');
    Route::get('/siswa/add', function () {
        return view('data_siswa/tambah_siswa');
    })->name('siswa.tambah');
    Route::get('/siswa/{id}', [SiswaController::class, 'detailSiswa'])->name('siswa.detail');
    Route::get('/siswa/edit/{id}', [SiswaController::class, 'editSiswa'])->name('siswa.edit');
    
    //Add
    Route::post('/siswa/add/proses', [SiswaController::class, 'tambahSiswa'])->name('siswa.tambah.proses');
    //Edit
    Route::post('/siswa/edit/proses', [SiswaController::class, 'prosesEditSiswa'])->name('siswa.edit.proses');
    //Delete
    Route::post('/siswa/delete/proses', [SiswaController::class, 'deleteSiswa'])->name('siswa.delete.proses');

    //Data Guru
    Route::get('/guru', [GuruController::class, 'listGuru'])->name('guru.list');
    Route::get('/guru/add', function () {
        return view('data_guru/tambah_guru');
    })->name('guru.tambah');
    Route::get('/guru/{id}', [GuruController::class, 'detailGuru'])->name('guru.detail');
    Route::get('/guru/edit/{id}', [GuruController::class, 'editGuru'])->name('guru.edit');

    //Add
    Route::post('/guru/add/proses', [GuruController::class, 'tambahGuru'])->name('guru.tambah.proses');
    //Edit
    Route::post('/guru/edit/proses', [GuruController::class, 'prosesEditGuru'])->name('guru.edit.proses');
    //Delete
    Route::post('/guru/delete/proses', [GuruController::class, 'deleteGuru'])->name('guru.delete.proses');

    //Data Satpam
    Route::get('/satpam', [SatpamController::class, 'listSatpam'])->name('satpam.list');
    Route::get('/satpam/add', function () {
        return view('data_satpam/tambah_satpam');
    })->name('satpam.tambah');
    Route::get('/satpam/{id}', [SatpamController::class, 'detailSatpam'])->name('satpam.detail');
    Route::get('/satpam/edit/{id}', [SatpamController::class, 'editSatpam'])->name('satpam.edit');

    //Add
    Route::post('/satpam/add/proses', [SatpamController::class, 'tambahSatpam'])->name('satpam.tambah.proses');
    //Edit
    Route::post('/satpam/edit/proses', [SatpamController::class, 'prosesEditSatpam'])->name('satpam.edit.proses');
    //Delete
    Route::post('/satpam/delete/proses', [SatpamController::class, 'deleteSatpam'])->name('satpam.delete.proses');

    //Data Berkunjung
    Route::get('/berkunjung/permintaan', [BerkunjungController::class, 'listBerkunjung'])->name('berkunjung.list');
    Route::get('/berkunjung/riwayat', [BerkunjungController::class, 'riwayatBerkunjung'])->name('berkunjung.riwayat');
    Route::get('/berkunjung/add', [BerkunjungController::class, 'formtambahBerkunjung'])->name('berkunjung.tambah');
    Route::get('/berkunjung/{id}', [BerkunjungController::class, 'detailBerkunjung'])->name('berkunjung.detail');
    Route::get('/berkunjung/edit/{id}', [BerkunjungController::class, 'editBerkunjung'])->name('berkunjung.edit');
    //Add
    Route::post('/berkunjung/add/proses', [BerkunjungController::class, 'tambahBerkunjung'])->name('berkunjung.tambah.proses');
    //Edit
    Route::post('/berkunjung/edit/proses', [BerkunjungController::class, 'prosesEditBerkunjung'])->name('berkunjung.edit.proses');
    //Delete
    Route::post('/berkunjung/delete/proses', [BerkunjungController::class, 'deleteBerkunjung'])->name('berkunjung.delete.proses');
    //Terima
    Route::post('/berkunjung/terima', [BerkunjungController::class, 'terimaBerkunjung'])->name('berkunjung.terima');
    //Tolak
    Route::post('/berkunjung/tolak', [BerkunjungController::class, 'tolakBerkunjung'])->name('berkunjung.tolak');

    //Logout
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
