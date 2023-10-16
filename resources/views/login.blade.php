<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Log in</title>

    <link rel="stylesheet" href="{{ url('public/backend/plugins/fontawesome-free/css/all.min.css') }}">

    <link rel="stylesheet" href="{{ url('public/backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ url('public/backend/dist/css/adminlte.min.css') }}">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href=""><b>Admin</a>
        </div>
        <div class="card">
            @include('_message')
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <form action="{{ url('login_post') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <span style="color:red;">{{ $errors->first('email') }}</span>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <span style="color:red;">{{ $errors->first('password') }}</span>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">

                            </div>
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                    </div>
                </form>

                <p class="mb-1">
                    <a href="{{ url('forgot-password') }}">I forgot my password</a>
                </p>
                <p class="mb-0">
                    <a href="{{ url('register') }}" class="text-center">Register a new membership</a>
                </p>
            </div>
        </div>
    </div>
    <script src="{{ url('public/backend/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ url('public/backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('public/backend/dist/js/adminlte.min.js') }}"></script>
</body>

</html>
