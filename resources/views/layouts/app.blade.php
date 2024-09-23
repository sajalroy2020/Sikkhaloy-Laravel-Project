<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@stack('title' ?? '')</title>
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
    <!-- Full Calender CSS -->
    <link rel="stylesheet" href="{{asset('admin')}}/css/fullcalendar.min.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{asset('admin')}}/css/animate.min.css">
    <!-- Select 2 CSS -->
    <link rel="stylesheet" href="{{asset('admin')}}/css/select2.min.css">
    <!-- Date Picker CSS -->
    <link rel="stylesheet" href="{{asset('admin')}}/css/datepicker.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('admin')}}/style.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('common')}}/css/plugins.css">
    <link rel="stylesheet" href="{{asset('common')}}/css/common.css">
    <link rel="stylesheet" href="{{asset('common/css/dataTables.css')}}" />
    <link rel="stylesheet" href="{{asset('common/css/dataTables.responsive.min.css')}}" />

    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-abc123..." crossorigin="anonymous" />
    @stack('style')
    <!-- Modernize js -->
    <script src="{{asset('admin')}}/js/modernizr-3.6.0.min.js"></script>
</head>

<body>
<!-- Preloader Start Here -->
<div id="preloader"></div>
<!-- Preloader End Here -->
<div id="wrapper" class="wrapper bg-ash">
    <!-- Header Menu Area Start Here -->
    @include('layouts.nav')
    <!-- Header Menu Area End Here -->
    <!-- Page Area Start Here -->
    <div class="dashboard-page-one">
        <!-- Sidebar Area Start Here -->
    @include('layouts.sidebar')
        <!-- Sidebar Area End Here -->
        @yield('content')
    </div>
    <!-- Page Area End Here -->
</div>
<!-- jquery-->
<script src="{{asset('admin')}}/js/jquery-3.3.1.min.js"></script>
<!-- Plugins js -->
<script src="{{asset('admin')}}/js/plugins.js"></script>
<!-- Popper js -->
<script src="{{asset('admin')}}/js/popper.min.js"></script>
<!-- Bootstrap js -->
<script src="{{asset('admin')}}/js/bootstrap.min.js"></script>
<!-- Counterup Js -->
<script src="{{asset('admin')}}/js/jquery.counterup.min.js"></script>
<!-- Moment Js -->
<script src="{{asset('admin')}}/js/moment.min.js"></script>
<!-- Waypoints Js -->
<script src="{{asset('admin')}}/js/jquery.waypoints.min.js"></script>
<!-- Scroll Up Js -->
<script src="{{asset('admin')}}/js/jquery.scrollUp.min.js"></script>
<!-- Full Calender Js -->
<script src="{{asset('admin')}}/js/fullcalendar.min.js"></script>
<!-- Chart Js -->
<script src="{{asset('admin')}}/js/Chart.min.js"></script>
<!-- Select 2 Js -->
<script src="{{asset('admin')}}/js/select2.min.js"></script>
<!-- Date Picker Js -->
<script src="{{asset('admin')}}/js/datepicker.min.js"></script>

<!-- Custom Js -->
<script src="{{asset('admin')}}/js/main.js"></script>
<script src="{{asset('common')}}/js/plugins.js"></script>
<script src="{{asset('common')}}/js/common.js"></script>
<script src="{{asset('common/js/dataTables.js')}}"></script>
<script src="{{asset('common/js/dataTables.responsive.min.js')}}"></script>
@stack('script')

<style>
    .zImage-upload-details {
        position: relative;
    }
    .zImage-upload-details .zImage-inside {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 100%;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        z-index: 1;
    }
    .zImage-upload-details label {
        z-index: 10 !important;
    }
    .zImage-upload-details .upload-img-box {
        background-color: var(--white);
        border: 0.125rem solid var(--stroke);
        border-radius: 0.75rem;
        height: 13.75rem;
        position: relative;
        overflow: hidden;
    }
    .zImage-upload-details .upload-img-box img {
        background-color: var(--white);
    }
</style>

<script>
    @if (Session::has('success'))
    toastr.success("{{ session('success') }}");
    @endif
    @if (Session::has('error'))
    toastr.error("{{ session('error') }}");
    @endif
    @if (Session::has('info'))
    toastr.info("{{ session('info') }}");
    @endif
    @if (Session::has('warning'))
    toastr.warning("{{ session('warning') }}");
    @endif

    @if (@$errors->any())
    @foreach ($errors->all() as $error)
    toastr.error("{{ $error }}");
    @endforeach
    @endif
</script>
</body>


</html>
