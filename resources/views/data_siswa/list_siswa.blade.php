@extends('master')

@section('title', 'List Siswa')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card mt-4 mb-4">
            <div class="card-header text-white">
                <h4>List Siswa</h4>
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
                <div class="table-responsive">
                    <table class="table table-bordered" id="tabelSiswa" width="100%" cellspacing="0">
                        <thead style="font-weight: bold;">
                            <tr class="text-center">
                                <th>#</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Absen</th>
                                <th>Kelas</th>
                                <th>Jurusan</th>
                                <th>Jenis Kelamin</th>
                                <th style="max-width: 110px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach ($siswas as $siswa)
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $siswa->nama }}</td>
                                <td>{{ $siswa->email }}</td>
                                <td>{{ $siswa->absen }}</td>
                                <td>{{ $siswa->kelas }}</td>
                                <td>{{ $siswa->jurusan }}</td>
                                <td>{{ $siswa->jenis_kelamin }}</td>
                                <td>
                                    <!-- Button trigger modal -->
                                    <a href="/siswa/{{ $siswa->id }}" class="btn btn-success">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="/siswa/edit/{{ $siswa->id }}" class="btn btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="#" class="btn btn-danger btn-delete" data-id="{{ $siswa->id }}" data-nama="{{ $siswa->nama }}" data-toggle="modal" data-target="#modal-delete">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="modal-delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="{{ route('siswa.delete.proses') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Hapus Data Siswa</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Anda yakin ingin menghapus data ?
                                <input type="hidden" name="id" class="id" id="id">
                                <input type="hidden" name="nama" class="nama" id="nama">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Hapus</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection