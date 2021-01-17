@extends('master')

@section('title', 'Edit Siswa')

@section('content')
<div class="row">
    <div class="col-6 offset-3">
        <div class="card mt-4 mb-4">
            <div class="card-header text-white">
                <h4>Edit Siswa</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('siswa.edit.proses') }}" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" value="{{ $siswa->id }}" name="id" id="id" required>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" value="{{ $siswa->nama }}" name="nama" id="nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="absen" class="form-label">Absen</label>
                        <input type="number" class="form-control" value="{{ $siswa->absen }}" name="absen" id="absen" required>
                    </div>
                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <select class="form-control" name="kelas" id="kelas" required>
                            <option value="{{ $siswa->kelas }}" >{{ $siswa->kelas }}</option>
                            <option value="X">X</option>
                            <option value="XI">XI</option>
                            <option value="XII">XII</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jurusan">Jurusan</label>
                        <select class="form-control" name="jurusan" id="jurusan" required>
                            <option value="{{ $siswa->jurusan }}">{{ $siswa->jurusan }}</option>
                            <option value="RPL">RPL</option>
                            <option value="MM">MM</option>
                            <option value="TEI">TEI</option>
                            <option value="BC">BC</option>
                            <option value="TKJ">TKJ</option>
                        </select>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin1" value="Laki - Laki" required>
                        <label class="form-check-label" for="jenis_kelamin1">Laki - Laki</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin2" value="Perempuan" required>
                        <label class="form-check-label" for="jenis_kelamin2">Perempuan</label>
                    </div>
                    <a href="{{ route('siswa.list') }}" class="btn btn-primary">Kembali</a>
                    <button type="submit" class="btn btn-primary" style="float: right;">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection