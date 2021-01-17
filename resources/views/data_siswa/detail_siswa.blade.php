@extends('master')

@section('title', 'Detail Siswa')

@section('content')
<div class="row">
    <div class="col-6 offset-3">
        <div class="card mt-4 mb-4">
            <div class="card-header text-white">
                <h4>Detail Siswa</h4>
            </div>
            <div class="card-body">
                <form >
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" value="{{ $siswa->nama }}" id="nama" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="absen" class="form-label">Absen</label>
                        <input type="number" class="form-control" value="{{ $siswa->absen }}" id="absen" readonly>
                    </div>
                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <select class="form-control" id="kelas" disabled>
                            <option value="{{ $siswa->kelas }}">{{ $siswa->kelas }}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jurusan">Jurusan</label>
                        <select class="form-control" id="jurusan" disabled>
                            <option value="{{ $siswa->jurusan }}">{{ $siswa->jurusan }}</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <input type="text" class="form-control" value="{{ $siswa->jenis_kelamin }}" id="jenis_kelamin" readonly>
                    </div>
                    <a href="{{ route('siswa.list') }}" class="btn btn-primary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection