<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Satpam;
use App\Models\User;

class SatpamController extends Controller
{
    public function tambahSatpam(Request $request) {
        $validateData = $request->validate([
            'nama' => 'required|min:4',
            'jenis_kelamin' => 'required',
        ]);

        $satpam = new Satpam();
        $satpam->nama = $validateData['nama'];
        $satpam->email = str_replace(' ', '', strtolower($validateData['nama']."@gmail.com"));
        $satpam->jenis_kelamin = $validateData['jenis_kelamin'];
        $satpam->save();
        
        $username = User::max('username');

        $user = new User();
        $user->nama = $validateData['nama'];
        $user->username = $username + 1;
        $user->email = str_replace(' ', '', strtolower($validateData['nama']."@gmail.com"));
        $user->password = bcrypt('1234567*');
        $user->role = 'satpam';
        $user->save();

        return redirect()->route('satpam.tambah')->with('pesanSuccess', "Selamat! Akun {$validateData['nama']} berhasil di Dibuat!");
    }
}
