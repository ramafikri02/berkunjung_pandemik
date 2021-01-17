<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berkunjung;
use App\Models\User;
use App\Models\Siswa;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Carbon;

class BerkunjungController extends Controller
{
    public function listBerkunjung() {
        $user = User::where('id', session::get('id'))->first();
        if($user->role == "siswa") {
            $berkunjungs = Berkunjung::where('status', "Pending")->where('nama', $user->nama)->get();
        }
        else if($user->role == "guru") {
            $berkunjungs = Berkunjung::where('status', "Pending")->get();
        }
        else if($user->role == "satpam") {
            $tgl = date("Y-m-d");
            $berkunjungs = Berkunjung::where('status', "Pending")->where('tgl_berkunjung', $tgl)->get();
        }
        return view('data_berkunjung/list_berkunjung', compact('berkunjungs'));
    }

    public function riwayatBerkunjung() {
        $user = User::where('id', session::get('id'))->first();
        $berkunjungs = Berkunjung::where('status', "Ditolak")->orWhere('status', "Diterima")->where('nama', $user->nama)->get();
        // dd($berkunjungs);
        return view('data_berkunjung/riwayat_berkunjung', compact('berkunjungs'));
    }

    public function detailBerkunjung($id) {
        $berkunjung = Berkunjung::find($id);
        return view('data_berkunjung/detail_berkunjung', compact('berkunjung'));
    }

    public function formtambahBerkunjung() {
        $user = User::where('id', session::get('id'))->first();
        $siswa = Siswa::where('nama', $user->nama)->first();
        $mytime = Carbon::now();
        $tanggal = $mytime->isoFormat('YYYY-MM-DD');
        $jam = $mytime->isoFormat('HH:mm');

        // dd($siswa);
        return view('data_berkunjung/tambah_berkunjung', compact('siswa', 'tanggal', 'jam'));
    }

    public function tambahBerkunjung(Request $request) {
        $validateData = $request->validate([
            'nama' => 'required|min:4',
            'absen' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
            'tgl_berkunjung' => 'required',
            'jam_berkunjung' => 'required',
            'keperluan' => 'required',
            'kondisi' => 'required',
        ]);

        // dd($request);

        $berkunjung = new Berkunjung();
        $berkunjung->nama = $validateData['nama'];
        $berkunjung->absen = $validateData['absen'];
        $berkunjung->kelas = $validateData['kelas'];
        $berkunjung->jurusan = $validateData['jurusan'];
        $berkunjung->tgl_berkunjung = $validateData['tgl_berkunjung'];
        $berkunjung->jam_berkunjung = $validateData['jam_berkunjung'];
        $berkunjung->keperluan = $validateData['keperluan'];
        $berkunjung->kondisi = $validateData['kondisi'];
        $berkunjung->status = "Pending"; 
        $berkunjung->save();

        return redirect()->route('berkunjung.list')->with('pesanSuccess', "Selamat! permintaan berkunjung berhasil di Dibuat!");
    }

    public function editBerkunjung($id) {
        $berkunjung = Berkunjung::find($id);
        return view('data_berkunjung/edit_berkunjung', compact('berkunjung'));
    }

    public function prosesEditBerkunjung(Request $request) {
        $validateData = $request->validate([
            'tgl_berkunjung' => 'required',
            'jam_berkunjung' => 'required',
            'keperluan' => 'required',
            'kondisi' => 'required',
        ]);

        $berkunjung = Berkunjung::where('id', $request->id)->first();
        $berkunjung->tgl_berkunjung = $validateData['tgl_berkunjung'];
        $berkunjung->jam_berkunjung = $validateData['jam_berkunjung'];
        $berkunjung->keperluan = $validateData['keperluan'];
        $berkunjung->kondisi = $validateData['kondisi'];
        $berkunjung->update();
        // dd($request);
        return redirect()->route('berkunjung.list')->with('pesanSuccess', "Permintaan Berkunjung berhasil di Ubah!");
    }

    public function deleteBerkunjung(Request $request) {
        // dd($request);
        $berkunjung = Berkunjung::find($request->id);
        $berkunjung->delete();
        return redirect()->route('berkunjung.list')->with('pesanSuccess', "Permintaan Berkunjung berhasil di Hapus!");
    }

    public function terimaBerkunjung(Request $request) {
        // dd($request);
        $berkunjung = Berkunjung::find($request->id);
        $berkunjung->status = "Diterima"; 
        $berkunjung->update();
        return redirect()->route('berkunjung.list')->with('pesanSuccess', "Permintaan Berkunjung telah di Setujui!");
    }

    public function tolakBerkunjung(Request $request) {
        // dd($request);
        $berkunjung = Berkunjung::find($request->id);
        $berkunjung->status = "Ditolak"; 
        $berkunjung->update();
        return redirect()->route('berkunjung.list')->with('pesanSuccess', "Permintaan Berkunjung telah di Tolak!");
    }
}
