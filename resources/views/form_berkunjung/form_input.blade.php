@extends('master')

@section('title', 'Form Input')

@section('content')
    <div class="row">
    <div class="col-6 offset-3">
        <div class="card mt-4 mb-4">
            <div class="card-header">
                <h2>Form Input Berkunjung</h2>
            </div>
            <div class="card-body">
                <form action="{{ url('/add/proses') }}" method="POST">
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
                        <input type="text" class="form-control" id="nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="absen" class="form-label">Absen</label>
                        <input type="number" class="form-control" id="absen" required>
                    </div>
                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <select class="form-control" id="kelas">
                            <option value="X">X</option>
                            <option value="XI">XI</option>
                            <option value="XII">XII</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jurusan">Jurusan</label>
                        <select class="form-control" id="jurusan">
                            <option value="RPL">RPL</option>
                            <option value="MM">MM</option>
                            <option value="TEI">TEI</option>
                            <option value="BC">BC</option>
                            <option value="TKJ">TKJ</option>
                        </select>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin1" value="option1">
                        <label class="form-check-label" for="jenis_kelamin1">Laki - Laki</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin2" value="option2">
                        <label class="form-check-label" for="jenis_kelamin2">Perempuan</label>
                    </div>
                    <button type="submit" class="btn btn-primary" style="float: right;">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection