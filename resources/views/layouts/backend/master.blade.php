<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dark Bootstrap Admin </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{ asset('/') }}backend/vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="{{ asset('/') }}backend/vendor/font-awesome/css/font-awesome.min.css">
    <!-- Custom Font Icons CSS-->
    <link rel="stylesheet" href="{{ asset('/') }}backend/css/font.css">
    <!-- Google fonts - Muli-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{ asset('/') }}backend/css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{ asset('/') }}backend/css/custom.css">
    <!--   iziTost css-->
    <link href="{{ asset('css/iziToast.css') }}" rel="stylesheet">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{ asset('/') }}backend/img/favicon.ico">
{{--    Select --2--}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
{{--    drofiy--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css" integrity="sha512-In/+MILhf6UMDJU4ZhDL0R0fEpsp4D3Le23m6+ujDWXwl3whwpucJG1PEmI3B07nyJx+875ccs+yX2CqQJUxUw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
    @stack('css')
</head>
<body>
    @include('layouts.backend.includes.header')
<div class="d-flex align-items-stretch">
    <!-- Sidebar Navigation-->
    @include('layouts.backend.includes.sidebar')
    <!-- Sidebar Navigation end-->

    @yield('content')

</div>
<!-- JavaScript files-->
<script src="{{ asset('/') }}backend/vendor/jquery/jquery.min.js"></script>
<script src="{{ asset('/') }}backend/vendor/popper.js/umd/popper.min.js"> </script>
<script src="{{ asset('/') }}backend/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="{{ asset('/') }}backend/vendor/jquery.cookie/jquery.cookie.js"> </script>
<script src="{{ asset('/') }}backend/vendor/chart.js/Chart.min.js"></script>
<script src="{{ asset('/') }}backend/vendor/jquery-validation/jquery.validate.min.js"></script>
<script src="{{ asset('/') }}backend/js/charts-home.js"></script>
<script src="{{ asset('/') }}backend/js/front.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('/') }}backend/js/deleteAlert.js"></script>
    <script src="{{ asset('js/iziToast.js') }}"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @include('vendor.lara-izitoast.toast')
    @stack('js')
</body>
</html>
