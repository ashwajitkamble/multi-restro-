<!DOCTYPE html>
<html lang="en" class="h-100">


<!-- Mirrored from davur.dexignzone.com/laravel/demo/page-login by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 29 Dec 2022 05:17:54 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Restaurant | Page Login</title>
    <meta name="description" content="Some description for the page"/>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('public/images/favicon.png')}}">
    <link href="{{ asset('public/css/style.css')}}" rel="stylesheet">
    
</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
        <div class="col-md-6">

        @yield('content')

    </div>
        <script src="{{ asset('public/vendor/global/global.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('public/vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('public/vendor/chart.js/Chart.bundle.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('public/vendor/apexchart/apexchart.js')}}" type="text/javascript"></script>
        <script src="{{ asset('public/js/custom.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('public/js/deznav-init.js')}}" type="text/javascript"></script>
      <script id="DZScript" src="../../../dzassets.s3.amazonaws.com/w3-global8bb6.js?btn_dir=right"></script>

</body>

</html>
