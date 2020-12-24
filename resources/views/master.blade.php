<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Starbhak | @yield('title')</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ url('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ url('assets/css/simple-sidebar.css') }}" rel="stylesheet">

    <link href="{{ url('assets/css/style.css') }}" rel="stylesheet">

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

                @if($role == "guru" OR $role == "siswa")
                <a href="#" class="list-group-item list-group-item-action bg-light">Request</a>
                <a href="#" class="list-group-item list-group-item-action bg-light">Riwayat</a>
                @endif

                @if($role == "admin" OR $role == "guru")
                <a href="#" class="list-group-item list-group-item-action bg-light">List Siswa</a>
                <a href="{{ route('siswa.tambah') }}" class="list-group-item list-group-item-action bg-light">Tambah Siswa</a>
                @endif

                @if($role == "admin")
                <a href="#" class="list-group-item list-group-item-action bg-light">List Guru</a>
                <a href="{{ route('guru.tambah') }}" class="list-group-item list-group-item-action bg-light">Tambah Guru</a>
                <a href="#" class="list-group-item list-group-item-action bg-light">List Satpam</a>
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

    <!-- Menu Toggle Script -->
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>

</body>

</html>