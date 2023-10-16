<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>

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
            @if (session('error'))
                <div class="alert alert-success" role="alert">
                    {{ session('error') }}
                </div>
            @endif
            <div class="card-body login-card-body">
                <p class="login-box-msg">Register</p>

                <form action="{{ url('register_post') }}" method="post">
                    {{ csrf_field() }}
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Name" name="name" required
                            value="{{ old('name') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <span style="color:red;">{{ $errors->first('name') }}</span>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email" name="email" required
                            value="{{ old('email') }}" onblur="duplicateEmail(this)">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <span style="color:red;" class="duplicate_message">{{ $errors->first('email') }}</span>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <span style="color:red;">{{ $errors->first('password') }}</span>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Confirm Password"
                            name="confirm_password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <span style="color:red;">{{ $errors->first('confirm_password') }}</span>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">

                            </div>
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>
                    </div>
                </form>

                <p class="mb-1">
                    <a href="{{ url('forgot-password') }}">I forgot my password</a>
                </p>
                <p class="mb-0">
                    <a href="{{ url('/') }}" class="text-center">Sign in</a>
                </p>
            </div>
        </div>
    </div>

    <script src="{{ url('public/backend/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ url('public/backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('public/backend/dist/js/adminlte.min.js') }}"></script>

    <script type="text/javascript">
        function duplicateEmail(element) {
            var email = $(element).val();
            $.ajax({
                type: "POST",
                url: '{{ url('checkemail') }}',
                data: {
                    email: email,
                    _token: "{{ csrf_token() }}"
                },
                dataType: "json",
                success: function(res) {
                    if (res.exists) {
                        $.('.duplicate_message').html("email taken");
                    } else {
                        $.('.duplicate_message').html("")
                    }
                },
                error: function(jqXHR, exception) {

                }
            });
        }
    </script>
</body>

</html>
