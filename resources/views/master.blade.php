<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Starbhak | @yield('title')</title>

    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">

    <!-- Bootstrap core CSS -->
    <link href="{{ url('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Sidebar -->
    <link href="{{ url('assets/css/simple-sidebar.css') }}" rel="stylesheet">
    
    <!-- Custom styles for this template -->
    <link href="{{ url('assets/css/style.css') }}" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="{{ url('assets/vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ url('assets/vendor/font-awesome-5/css/fontawesome-all.min.css') }}" rel="stylesheet" media="all">

    <?php

    use Illuminate\Support\Facades\Session;
    ?>

</head>

<body>

    <div class="d-flex" id="wrapper">

        <!-- Sidebar -->
        <div class="bg-light border-right" id="sidebar-wrapper">
            <div class="sidebar-heading">Starbhak </div>
            <div class="list-group list-group-flush">
                <?php
                $role = Session::get('role');
                ?>

                @if($role == "siswa")
                <a href="{{ route('berkunjung.tambah') }}" class="list-group-item list-group-item-action bg-light">Form Berkunjung</a>
                @endif

                @if($role == "guru" OR $role == "siswa")
                <a href="{{ route('berkunjung.list') }}" class="list-group-item list-group-item-action bg-light">Permintaan</a>
                <a href="{{ route('berkunjung.riwayat') }}" class="list-group-item list-group-item-action bg-light">Riwayat</a>
                @endif

                @if($role == "admin" OR $role == "guru")
                <a href="{{ route('siswa.list') }}" class="list-group-item list-group-item-action bg-light">List Siswa</a>
                <a href="{{ route('siswa.tambah') }}" class="list-group-item list-group-item-action bg-light">Tambah Siswa</a>
                @endif

                @if($role == "admin")
                <a href="{{ route('guru.list') }}" class="list-group-item list-group-item-action bg-light">List Guru</a>
                <a href="{{ route('guru.tambah') }}" class="list-group-item list-group-item-action bg-light">Tambah Guru</a>
                <a href="{{ route('satpam.list') }}" class="list-group-item list-group-item-action bg-light">List Satpam</a>
                <a href="{{ route('satpam.tambah') }}" class="list-group-item list-group-item-action bg-light">Tambah Satpam</a>
                @endif
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">

            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <button class="btn btn-primary" id="menu-toggle">Toggle Menu</button>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        <li class="nav-item dropdown">
                            <?php
                            $profile = Session::get('nama');
                            ?>
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ $profile }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Akun saya</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}">Keluar</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Bootstrap core JavaScript -->
    <script src="{{ url('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Datatables -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

    <!-- Menu Toggle Script -->
    <script src="{{ url('assets/js/script.js') }}"></script>

</body>

</html>