@extends('master')

@section('title', 'Profile')

@section('content')
<div class="row">
    <div class="col-6 offset-3">
        <div class="card mt-4 mb-4">
            <div class="card-header text-white">
                <h4>Profile Saya</h4>
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    {{ csrf_field() }}
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" value="{{ $profile->nama }}" id="nama" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" value="{{ $profile->email }}" id="email" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" value="{{ $profile->password }}" id="password" readonly>
                    </div>
                    <a href="{{ route('siswa.list') }}" class="btn btn-primary">Kembali</a>
                    <button type="submit" class="btn btn-primary" style="float: right;">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection