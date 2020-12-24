<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berkunjung;

class BerkunjungController extends Controller
{
    public function requestBerkunjung(Request $request) {
        $validateData = $request->validate([
            'nama' => 'required|min:4',
            'email' => 'required',
            'absen' => 'required',
            'kelas' => 'required',
            'tgl_berkunjung' => 'required',
            'keperluan' => 'required',
            'kondisi' => 'required',
        ]);

        $berkunjung = new Berkunjung();
        $berkunjung->nama = $validateData['nama'];
        $berkunjung->email = $validateData['email'];
        $berkunjung->absen = $validateData['absen'];
        $berkunjung->kelas = $validateData['kelas'];
        $berkunjung->tgl_berkunjung = $validateData['tgl_berkunjung'];
        $berkunjung->keperluan = $validateData['keperluan'];
        $berkunjung->kondisi = $validateData['kondisi'];
        $berkunjung->save();

        return redirect()->route('siswa.tambah')->with('pesanSuccess', "Selamat! Akun {$validateData['nama']} berhasil di Dibuat!");
    }
}
