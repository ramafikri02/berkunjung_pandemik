@extends('master')

@section('title', 'List Satpam')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card mt-4 mb-4">
            <div class="card-header text-white">
                <h4>List Satpam</h4>
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
                    <table class="table table-bordered" id="tabelSatpam" width="100%" cellspacing="0">
                        <thead style="font-weight: bold;">
                            <tr class="text-center">
                                <th>#</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Jenis Kelamin</th>
                                <th style="max-width: 110px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach ($satpams as $satpam)
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $satpam->nama }}</td>
                                <td>{{ $satpam->email }}</td>
                                <td>{{ $satpam->jenis_kelamin }}</td>
                                <td>
                                    <!-- Button trigger modal -->
                                    <a href="/satpam/{{ $satpam->id }}" class="btn btn-success">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="/satpam/edit/{{ $satpam->id }}" class="btn btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="#" class="btn btn-danger btn-delete" data-id="{{ $satpam->id }}" data-nama="{{ $satpam->nama }}" data-toggle="modal" data-target="#modal-delete">
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
                        <form action="{{ route('satpam.delete.proses') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
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