<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Admin Login</title>
    <!-- GLOBAL MAINLY STYLES-->
    <link href="{{asset('assets/admin/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/admin/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/admin/vendors/themify-icons/css/themify-icons.css')}}" rel="stylesheet" />
    <!-- THEME STYLES-->
    <link href="{{asset('assets/admin/css/main.css')}}" rel="stylesheet" />
    <!-- PAGE LEVEL STYLES-->
    <link href="{{asset('assets/admin/css/pages/auth-light.css')}}" rel="stylesheet" />
</head>

<body class="bg-silver-300">
    <div class="content">
        <div class="brand">
            <a class="link" href="/">
                {{-- {{$dashboard_composer->site_name}} --}}
            </a>
        </div>
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @if(session('message'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            {{ session('message') }}
        </div>
        @endif
        <form id="login-form" action="{{route('postLogin')}}" method="POST">
            <meta name="csrf-token" value="{{ csrf_token() }}" />
            <h2 class="login-title">Log in</h2>
            <div class="form-group">
                <div class="input-group-icon right">
                    <div class="input-icon"><i class="fa fa-envelope"></i></div>
                    <input class="form-control" type="email" value="admin@admin.com" name="email" placeholder="Email" autocomplete="off">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group-icon right">
                    <div class="input-icon"><i class="fa fa-lock font-16"></i></div>
                    <input class="form-control" type="password" value="admin@123" name="password" placeholder="Password">
                </div>
            </div>

            <div class="form-group text-center">
                <button class="btn btn-info btn-block mb-4" type="submit">Login</button>

                <a href="{{route('password-reset')}}" style="margin-right: 12px" class="btn btn-success">Forgot
                    Password</a>
                <a href="/" class="btn btn-success">Home</a>

            </div>

        </form>
    </div>
    <!-- BEGIN PAGA BACKDROPS-->
    <!-- <div class="sidenav-backdrop backdrop"></div>
    <div class="preloader-backdrop">
        <div class="page-preloader">Loading</div>
    </div> -->
    <!-- END PAGA BACKDROPS-->
    <!-- CORE PLUGINS -->
    <script src="{{asset('assets/admin/vendors/jquery/dist/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/admin/vendors/popper.js/dist/umd/popper.min.js')}}" type="text/javascript">
    </script>
    <script src="{{asset('assets/admin/vendors/bootstrap/dist/js/bootstrap.min.js')}}" type="text/javascript">
    </script>
    <!-- PAGE LEVEL PLUGINS -->
    <script src="{{asset('assets/admin/vendors/jquery-validation/dist/jquery.validate.min.js')}}"
        type="text/javascript"></script>
    <!-- CORE SCRIPTS-->
    <script src="{{asset('assets/admin/js/app.js')}}" type="text/javascript"></script>
    <!-- PAGE LEVEL SCRIPTS-->
    <script type="text/javascript">
        $(function() {
            $('#login-form').validate({
                errorClass: "help-block",
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true
                    }
                },
                highlight: function(e) {
                    $(e).closest(".form-group").addClass("has-error")
                },
                unhighlight: function(e) {
                    $(e).closest(".form-group").removeClass("has-error")
                },
            });
        });
    </script>
</body>

</html>