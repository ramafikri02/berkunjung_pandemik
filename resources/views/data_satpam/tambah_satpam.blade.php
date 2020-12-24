@extends('master')

@section('title', 'Input Satpam')

@section('content')
<div class="row">
    <div class="col-6 offset-3">
        <div class="card mt-4 mb-4">
            <div class="card-header text-white">
                <h4>Tambah Satpam</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('satpam.tambah.proses') }}" method="POST">
                    {{ csrf_field() }}
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
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama" required>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin1" value="Laki - Laki" required>
                        <label class="form-check-label" for="jenis_kelamin1">Laki - Laki</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin2" value="Perempuan" required>
                        <label class="form-check-label" for="jenis_kelamin2">Perempuan</label>
                    </div>
                    <button type="submit" class="btn btn-primary" style="float: right;">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection