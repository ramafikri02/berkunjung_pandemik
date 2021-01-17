<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Satpam;
use App\Models\User;

class SatpamController extends Controller
{
    public function listSatpam() {
        $satpams = Satpam::All();
        return view('data_satpam/list_satpam', compact('satpams'));
    }

    public function detailSatpam($id) {
        $satpam = Satpam::find($id);
        return view('data_satpam/detail_satpam', compact('satpam'));
    }

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
        $user->password = bcrypt('12345678');
        $user->role = 'satpam';
        $user->save();

        return redirect()->route('satpam.tambah')->with('pesanSuccess', "Selamat! Data {$validateData['nama']} berhasil di Dibuat!");
    }

    public function editSatpam($id) {
        $satpam = Satpam::find($id);
        return view('data_satpam/edit_satpam', compact('satpam'));
    }

    public function prosesEditSatpam(Request $request) {
        $validateData = $request->validate([
            'nama' => 'required|min:4',
            'jenis_kelamin' => 'required',
        ]);

        $satpam = Satpam::where('id', $request->id)->first();
        $satpam->nama = $validateData['nama'];
        $satpam->jenis_kelamin = $validateData['jenis_kelamin'];
        $satpam->update();
        // dd($request);
        return redirect()->route('satpam.list')->with('pesanSuccess', "Data  {$validateData['nama']} berhasil di Ubah!");
    }

    public function deleteSatpam(Request $request) {
        // dd($request);
        $satpam = Satpam::find($request->id);
        $satpam->delete();
        return redirect()->route('satpam.list')->with('pesanSuccess', "Data  {$request->nama} berhasil di Hapus!");
    }
}
