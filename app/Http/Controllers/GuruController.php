<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\User;

class GuruController extends Controller
{
    public function tambahGuru(Request $request) {
        $validateData = $request->validate([
            'nama' => 'required|min:4',
            'mata_pelajaran' => 'required',
            'jenis_kelamin' => 'required',
        ]);

        $guru = new Guru();
        $guru->nama = $validateData['nama'];
        $guru->email = str_replace(' ', '', strtolower($validateData['nama']."@gmail.com"));
        $guru->mata_pelajaran = $validateData['mata_pelajaran'];
        $guru->jenis_kelamin = $validateData['jenis_kelamin'];
        $guru->save();
        
        $username = User::max('username');

        $user = new User();
        $user->nama = $validateData['nama'];
        $user->username = $username + 1;
        $user->email = str_replace(' ', '', strtolower($validateData['nama']."@gmail.com"));
        $user->password = bcrypt('1234567*');
        $user->role = 'guru';
        $user->save();

        return redirect()->route('guru.tambah')->with('pesanSuccess', "Selamat! Akun {$validateData['nama']} berhasil di Dibuat!");
    }
}
