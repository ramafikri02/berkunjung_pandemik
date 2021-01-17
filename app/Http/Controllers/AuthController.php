<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $data = User::where('email', $email)->first();
        if ($data && Hash::Check($password, $data->password)) {
            Session::put('id', $data->id);
            Session::put('nama', $data->nama);
            Session::put('email', $data->email);
            Session::put('password', $data->password);
            Session::put('role', $data->role);

            session(['berhasil_login' => true]);
            if ($data->role == "admin") {
                return redirect()->route('siswa.tambah');
            } else if ($data->role == "guru") {
                return redirect()->route('berkunjung.list');
            } else if ($data->role == "satpam") {
                return redirect()->route('berkunjung.list');
            } else if ($data->role == "siswa") {
                return redirect()->route('berkunjung.list');
            }
        } else {
            return redirect()->back()->with('pesanDanger', "Email atau Password Anda Salah!");
        }
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('login')->with('pesanSuccess', "Anda telah keluar!");
    }
}
