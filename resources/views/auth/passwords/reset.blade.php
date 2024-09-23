<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ __('Reset Password') }}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('admin')}}/img/favicon.png">
    <!-- Normalize CSS -->
    <link rel="stylesheet" href="{{asset('admin')}}/css/normalize.css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{asset('admin')}}/css/main.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('admin')}}/css/bootstrap.min.css">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{asset('admin')}}/css/all.min.css">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="{{asset('admin')}}/fonts/flaticon.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{asset('admin')}}/css/animate.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('admin')}}/style.css">
    <!-- Modernize js -->
    <script src="{{asset('admin')}}/js/modernizr-3.6.0.min.js"></script>
</head>

<body>
<!-- Preloader Start Here -->
<div id="preloader"></div>
<!-- Preloader End Here -->
<!-- Login Page Start Here -->
<div class="login-page-wrap">
    <div class="login-page-content">
        <div class="login-box">
            <div class="item-logo">
                <img src="{{asset('admin')}}/img/logo2.png" alt="logo">
            </div>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <form method="POST" action="{{ route('password.update') }}" class="login-form">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" placeholder="Enter your email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    <i class="far fa-envelope"></i>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" placeholder="Enter password" class="form-control  @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    <i class="fas fa-lock"></i>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" placeholder="Enter password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    <i class="fas fa-lock"></i>
                </div>
                <div class="form-group">
                    <button type="submit" class="login-btn">Reset Password</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Login Page End Here -->
<!-- jquery-->
<script src="{{asset('admin')}}/js/jquery-3.3.1.min.js"></script>
<!-- Plugins js -->
<script src="{{asset('admin')}}/js/plugins.js"></script>
<!-- Popper js -->
<script src="{{asset('admin')}}/js/popper.min.js"></script>
<!-- Bootstrap js -->
<script src="{{asset('admin')}}/js/bootstrap.min.js"></script>
<!-- Scroll Up Js -->
<script src="{{asset('admin')}}/js/jquery.scrollUp.min.js"></script>
<!-- Custom Js -->
<script src="{{asset('admin')}}/js/main.js"></script>

</body>

</html>
