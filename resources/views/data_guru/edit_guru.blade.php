@extends('master')

@section('title', 'Edit Guru')

@section('content')
<div class="row">
    <div class="col-6 offset-3">
        <div class="card mt-4 mb-4">
            <div class="card-header text-white">
                <h4>Edit Guru</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('guru.edit.proses') }}" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" value="{{ $guru->id }}" name="id" id="id" required>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" value="{{ $guru->nama }}" name="nama" id="nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="mata_pelajaran" class="form-label">Mata Pelajaran</label>
                        <input type="text" class="form-control" value="{{ $guru->mata_pelajaran }}" name="mata_pelajaran" id="mata_pelajaran" required>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin1" value="Laki - Laki" required>
                        <label class="form-check-label" for="jenis_kelamin1">Laki - Laki</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin2" value="Perempuan" required>
                        <label class="form-check-label" for="jenis_kelamin2">Perempuan</label>
                    </div>
                    <a href="{{ route('guru.list') }}" class="btn btn-primary">Kembali</a>
                    <button type="submit" class="btn btn-primary" style="float: right;">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection