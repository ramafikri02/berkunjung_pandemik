<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\User;

class GuruController extends Controller
{
    public function listGuru() {
        $gurus = Guru::All();
        return view('data_guru/list_guru', compact('gurus'));
    }

    public function detailGuru($id) {
        $guru = Guru::find($id);
        return view('data_guru/detail_guru', compact('guru'));
    }

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
        $user->password = bcrypt('12345678');
        $user->role = 'guru';
        $user->save();

        return redirect()->route('guru.tambah')->with('pesanSuccess', "Selamat! Data {$validateData['nama']} berhasil di Dibuat!");
    }

    public function editGuru($id) {
        $guru = Guru::find($id);
        return view('data_guru/edit_guru', compact('guru'));
    }

    public function prosesEditGuru(Request $request) {
        $validateData = $request->validate([
            'nama' => 'required|min:4',
            'mata_pelajaran' => 'required',
            'jenis_kelamin' => 'required',
        ]);

        $guru = Guru::where('id', $request->id)->first();
        $guru->nama = $validateData['nama'];
        $guru->mata_pelajaran = $validateData['mata_pelajaran'];
        $guru->jenis_kelamin = $validateData['jenis_kelamin'];
        $guru->update();
        // dd($request);
        return redirect()->route('guru.list')->with('pesanSuccess', "Data  {$validateData['nama']} berhasil di Ubah!");
    }

    public function deleteGuru(Request $request) {
        // dd($request);
        $guru = Guru::find($request->id);
        $guru->delete();
        return redirect()->route('guru.list')->with('pesanSuccess', "Data  {$request->nama} berhasil di Hapus!");
    }
}
