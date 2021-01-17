@extends('master')

@section('title', 'Form Input')

@section('content')
<div class="row">
    <div class="col-6 offset-3">
        <div class="card mt-4 mb-4">
            <div class="card-header text-white">
                <h4>Form Input Berkunjung</h4>
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
                <form action="{{ route('berkunjung.tambah.proses') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama" value="{{ $siswa->nama }}" readonly>
                    </div>
                    <input type="hidden" class="form-control" name="absen" id="absen" value="{{ $siswa->absen }}" readonly>
                    <input type="hidden" class="form-control" name="kelas" id="kelas" value="{{ $siswa->kelas }}" readonly>
                    <input type="hidden" class="form-control" name="jurusan" id="jurusan" value="{{ $siswa->jurusan }}" readonly>
                    <div class="mb-3">
                        <label for="keperluan" class="form-label">Keperluan</label>
                        <textarea class="form-control" aria-label="With textarea" name="keperluan" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="kondisi">Kondisi</label>
                        <select class="form-control" name="kondisi" id="kondisi" required>
                            <option value="" readonly>Kondisi...</option>
                            <option value="Sehat">Sehat</option>
                            <option value="Tidak Sehat">Tidak Sehat</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="example-date-input">Date</label>
                        <input class="form-control" type="date" value="{{ $tanggal }}" name="tgl_berkunjung" id="example-date-input" required>
                    </div>
                    <div class="form-group">
                        <label for="example-time-input">Time</label>
                        <input class="form-control" type="time" value="{{ $jam }}" name="jam_berkunjung" id="example-time-input" required>
                    </div>
                    <a href="{{ route('berkunjung.list') }}" class="btn btn-primary">Kembali</a>
                    <button type="submit" class="btn btn-primary" style="float: right;">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection