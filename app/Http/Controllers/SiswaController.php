<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\User;

class SiswaController extends Controller
{
    public function tambahSiswa(Request $request) {
        $validateData = $request->validate([
            'nama' => 'required|min:4',
            'absen' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
            'jenis_kelamin' => 'required',
        ]);

        $siswa = new Siswa();
        $siswa->nama = $validateData['nama'];
        $siswa->email = str_replace(' ', '', strtolower($validateData['nama']."@gmail.com"));
        $siswa->absen = $validateData['absen'];
        $siswa->kelas = $validateData['kelas'];
        $siswa->jurusan = $validateData['jurusan'];
        $siswa->jenis_kelamin = $validateData['jenis_kelamin'];
        $siswa->save();
        
        $username = User::max('username');

        $user = new User();
        $user->nama = $validateData['nama'];
        $user->username = $username + 1;
        $user->email = str_replace(' ', '', strtolower($validateData['nama']."@gmail.com"));
        $user->password = bcrypt('1234567*');
        $user->role = 'siswa';
        $user->save();

        return redirect()->route('siswa.tambah')->with('pesanSuccess', "Selamat! Akun {$validateData['nama']} berhasil di Dibuat!");
    }
}
