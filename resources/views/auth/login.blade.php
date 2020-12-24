<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap core CSS -->
    <link href="{{ url('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/auth/style.css') }}">

    <title>Starbhak | Masuk</title>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-6 offset-3">
                <div class="card">
                    <div class="card-header text-white">
                        Silahkan login untuk melanjutkan
                    </div>
                    <div class="card-body">
                        <form action="{{ url('/login') }}" method="POST">
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
                            @if(session()->has('pesanLogin'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">{{ Session::get('pesanLogin') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" id="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" id="password" required>
                            </div>
                            <a href="#">Lupa Password?</a>
                            <button type="submit" class="btn btn-primary" style="float: right;">Masuk</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>