@extends('master')

@section('title', 'Input Guru')

@section('content')
<div class="row">
    <div class="col-6 offset-3">
        <div class="card mt-4 mb-4">
            <div class="card-header text-white">
                <h4>Tambah Guru</h4>
            </div>
            <div class="card-body">
                @if(session()->has('pesanSuccess'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">{{ Session::get('pesanSuccess') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                @if(session()->has('pesanDanger'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ Session::get('pesanDanger') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                <form action="{{ route('guru.tambah.proses') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="mata_pelajaran">Mata Pelajaran</label>
                        <select class="form-control" name="mata_pelajaran" id="mata_pelajaran" required>
                            <option value="" readonly>Pilih mapel...</option>
                            <option value="Bahasa Indonesia">Bahasa Indonesia</option>
                            <option value="Bahasa Inggris">Bahasa Inggris</option>
                            <option value="MTK">MTK</option>
                            <option value="PBO">PBO</option>
                            <option value="PWPB">PWPB</option>
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
                    <a href="{{ route('guru.list') }}" class="btn btn-primary">Kembali</a>
                    <button type="submit" class="btn btn-primary" style="float: right;">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection