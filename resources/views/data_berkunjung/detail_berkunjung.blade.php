@extends('master')

@section('title', 'Detail Berkunjung')

@section('content')
<div class="row">
    <div class="col-6 offset-3">
        <div class="card mt-4 mb-4">
            <div class="card-header text-white">
                <h4>Detail Berkunjung</h4>
            </div>
            <div class="card-body">
                <form >
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" value="{{ $berkunjung->nama }}" id="nama" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="absen" class="form-label">Absen</label>
                        <input type="number" class="form-control" value="{{ $berkunjung->absen }}" id="absen" readonly>
                    </div>
                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <select class="form-control" id="kelas" disabled>
                            <option value="{{ $berkunjung->kelas }}">{{ $berkunjung->kelas }}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jurusan">Jurusan</label>
                        <select class="form-control" id="jurusan" disabled>
                            <option value="{{ $berkunjung->jurusan }}">{{ $berkunjung->jurusan }}</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tgl_berkunjung" class="form-label">Tanggal</label>
                        <input type="text" class="form-control" value="{{ $berkunjung->tgl_berkunjung }}" id="tgl_berkunjung" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="jam_berkunjung" class="form-label">Jam</label>
                        <input type="text" class="form-control" value="{{ $berkunjung->jam_berkunjung }}" id="jam_berkunjung" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="keperluan" class="form-label">Keperluan</label>
                        <input type="text" class="form-control" value="{{ $berkunjung->keperluan }}" id="keperluan" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="kondisi" class="form-label">Kondisi</label>
                        <input type="text" class="form-control" value="{{ $berkunjung->kondisi }}" id="kondisi" readonly>
                    </div>
                    <a href="{{ route('berkunjung.list') }}" class="btn btn-primary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection