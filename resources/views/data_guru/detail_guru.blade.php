@extends('master')

@section('title', 'Detail Guru')

@section('content')
<div class="row">
    <div class="col-6 offset-3">
        <div class="card mt-4 mb-4">
            <div class="card-header text-white">
                <h4>Detail Guru</h4>
            </div>
            <div class="card-body">
                <form >
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" value="{{ $guru->nama }}" id="nama" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" value="{{ $guru->email }}" id="email" readonly>
                    </div>
                    <div class="form-group">
                        <label for="mata_pelajaran">Mata Pelajaran</label>
                        <select class="form-control" id="mata_pelajaran" disabled>
                            <option value="{{ $guru->mata_pelajaran }}">{{ $guru->mata_pelajaran }}</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <input type="text" class="form-control" value="{{ $guru->jenis_kelamin }}" id="jenis_kelamin" readonly>
                    </div>
                    <a href="{{ route('guru.list') }}" class="btn btn-primary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection