<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\User;

class SiswaController extends Controller
{
    public function listSiswa() {
        $siswas = Siswa::All();
        return view('data_siswa/list_siswa', compact('siswas'));
    }

    public function detailSiswa($id) {
        $siswa = Siswa::find($id);
        return view('data_siswa/detail_siswa', compact('siswa'));
    }

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
        $user->password = bcrypt('12345678');
        $user->role = 'siswa';
        $user->save();

        return redirect()->route('siswa.tambah')->with('pesanSuccess', "Selamat! Data {$validateData['nama']} berhasil di Dibuat!");
    }

    public function editSiswa($id) {
        $siswa = Siswa::find($id);
        return view('data_siswa/edit_siswa', compact('siswa'));
    }

    public function prosesEditSiswa(Request $request) {
        $validateData = $request->validate([
            'nama' => 'required|min:4',
            'absen' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
            'jenis_kelamin' => 'required',
        ]);

        $siswa = Siswa::where('id', $request->id)->first();
        $siswa->nama = $validateData['nama'];
        $siswa->absen = $validateData['absen'];
        $siswa->kelas = $validateData['kelas'];
        $siswa->jurusan = $validateData['jurusan'];
        $siswa->jenis_kelamin = $validateData['jenis_kelamin'];
        $siswa->update();
        // dd($request);
        return redirect()->route('siswa.list')->with('pesanSuccess', "Data  {$validateData['nama']} berhasil di Ubah!");
    }

    public function deleteSiswa(Request $request) {
        // dd($request);
        $siswa = Siswa::find($request->id);
        $siswa->delete();
        return redirect()->route('siswa.list')->with('pesanSuccess', "Data  {$request->nama} berhasil di Hapus!");
    }
}
