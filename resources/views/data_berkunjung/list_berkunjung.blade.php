@extends('master')

@section('title', 'List Berkunjung')

@section('content')
<?php

use Illuminate\Support\Facades\Session;

$role = Session::get('role');
?>
<div class="row">
    <div class="col-12">
        <div class="card mt-4 mb-4">
            <div class="card-header text-white">
                <h4>List Berkunjung</h4>
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
                    <table class="table table-bordered" id="tabelBerkunjung" width="100%" cellspacing="0">
                        <thead style="font-weight: bold;">
                            <tr class="text-center">
                                <th>#</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>Tanggal</th>
                                <th>Jam</th>
                                <th>Kondisi</th>
                                <th>Status</th>
                                @if($role == "siswa" OR $role == "guru")
                                <th style="max-width: 110px;">Action</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($berkunjungs as $berkunjung)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $berkunjung->nama }}</td>
                                <td>{{ $berkunjung->kelas }}</td>
                                <td>{{ $berkunjung->tgl_berkunjung }}</td>
                                <td>{{ $berkunjung->jam_berkunjung }}</td>
                                <td>{{ $berkunjung->kondisi }}</td>
                                <?php
                                if ($berkunjung->status == "Pending") {
                                    $bg = "bg-warning";
                                } else {
                                    $bg = "bg-danger text-white";
                                }
                                ?>
                                <td class="{{ $bg }}">{{ $berkunjung->status }}</td>
                                @if($role == "siswa")
                                <td>
                                    <!-- Button trigger modal -->
                                    <a href="/berkunjung/{{ $berkunjung->id }}" class="btn btn-success">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="/berkunjung/edit/{{ $berkunjung->id }}" class="btn btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="#" class="btn btn-danger btn-delete" data-id="{{ $berkunjung->id }}" data-nama="{{ $berkunjung->nama }}" data-toggle="modal" data-target="#modal-delete">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                                @endif
                                @if($role == "guru")
                                <td>
                                    <!-- Button trigger modal -->
                                    <a href="#" class="btn btn-success btn-tolak" data-id="{{ $berkunjung->id }}" data-nama="{{ $berkunjung->nama }}" data-toggle="modal" data-target="#modal-terima">
                                        <i class="fas fa-check-circle"></i>
                                    </a>
                                    <a href="#" class="btn btn-danger btn-tolak" data-id="{{ $berkunjung->id }}" data-nama="{{ $berkunjung->nama }}" data-toggle="modal" data-target="#modal-tolak">
                                        <i class="fas fa-times-circle"></i>
                                    </a>
                                </td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Modal Hapus -->
            <div class="modal fade" id="modal-delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="{{ route('berkunjung.delete.proses') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Anda yakin ingin menghapus Permintaan Berkunjung ini?
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

            <!-- Modal Terima -->
            <div class="modal fade" id="modal-terima" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="{{ route('berkunjung.terima') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Setujui</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Anda yakin ingin menyetujui Permintaan Berkunjung ini?
                                <input type="hidden" name="id" class="id" id="id">
                                <input type="hidden" name="nama" class="nama" id="nama">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Terima</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <!-- Modal Tolak -->
            <div class="modal fade" id="modal-tolak" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="{{ route('berkunjung.tolak') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Tolak</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Anda yakin ingin menolak Permintaan Berkunjung ini?
                                <input type="hidden" name="id" class="id" id="id">
                                <input type="hidden" name="nama" class="nama" id="nama">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Tolak</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection