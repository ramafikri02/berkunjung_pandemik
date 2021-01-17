@extends('master')

@section('title', 'Edit Berkunjung')

@section('content')
<div class="row">
    <div class="col-6 offset-3">
        <div class="card mt-4 mb-4">
            <div class="card-header text-white">
                <h4>Edit Berkunjung</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('berkunjung.edit.proses') }}" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="id" id="id" value="{{ $berkunjung->id }}" readonly>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama" value="{{ $berkunjung->nama }}" readonly>
                    </div>
                    <input type="hidden" class="form-control" name="absen" id="absen" value="{{ $berkunjung->absen }}" readonly>
                    <input type="hidden" class="form-control" name="kelas" id="kelas" value="{{ $berkunjung->kelas }}" readonly>
                    <input type="hidden" class="form-control" name="jurusan" id="jurusan" value="{{ $berkunjung->jurusan }}" readonly>
                    <div class="mb-3">
                        <label for="keperluan" class="form-label">Keperluan</label>
                        <textarea class="form-control" aria-label="With textarea" name="keperluan" value="{{ $berkunjung->keperluan }}" required>{{ $berkunjung->keperluan }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="kondisi">Kondisi</label>
                        <select class="form-control" name="kondisi" id="kondisi" required>
                            <option value="{{ $berkunjung->kondisi }}">{{ $berkunjung->kondisi }}</option>
                            <option value="Sehat">Sehat</option>
                            <option value="Tidak Sehat">Tidak Sehat</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="example-date-input">Tanggal</label>
                        <input class="form-control" type="date" value="{{ $berkunjung->tgl_berkunjung }}" name="tgl_berkunjung" id="example-date-input" required>
                    </div>
                    <div class="form-group">
                        <label for="example-time-input">Jam</label>
                        <input class="form-control" type="time" value="{{ $berkunjung->jam_berkunjung }}" name="jam_berkunjung" id="example-time-input" required>
                    </div>
                    <input type="hidden" class="form-control" name="status" id="status" value="{{ $berkunjung->status }}" readonly>
                    <a href="{{ route('berkunjung.list') }}" class="btn btn-primary">Kembali</a>
                    <button type="submit" class="btn btn-primary" style="float: right;">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection