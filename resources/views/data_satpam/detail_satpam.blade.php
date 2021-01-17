@extends('master')

@section('title', 'Detail Satpam')

@section('content')
<div class="row">
    <div class="col-6 offset-3">
        <div class="card mt-4 mb-4">
            <div class="card-header text-white">
                <h4>Detail Satpam</h4>
            </div>
            <div class="card-body">
                <form >
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" value="{{ $satpam->nama }}" id="nama" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" value="{{ $satpam->email }}" id="email" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <input type="text" class="form-control" value="{{ $satpam->jenis_kelamin }}" id="jenis_kelamin" readonly>
                    </div>
                    <a href="{{ route('satpam.list') }}" class="btn btn-primary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection