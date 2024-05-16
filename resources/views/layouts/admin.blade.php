<!DOCTYPE html>
<html lang="en">

<head>
    <title>Portal - Bootstrap 5 Admin Dashboard Template For Developers</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="Portal - Bootstrap 5 Admin Dashboard Template For Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">

    <link rel="shortcut icon" href="favicon.ico">

    <!-- FontAwesome JS-->
    <script defer src="{{ url('admin/assets/plugins/fontawesome/js/all.min.js')}}"></script>

    <!-- App CSS -->
    <link id="theme-style" rel="stylesheet" href="{{ url('admin/assets/css/portal.css')}}">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.js"></script>
</head>


<body class="app">
    <header class="app-header fixed-top">
        @include('admins.partials/header')
        @include('admins.partials.slider')
    </header>
    <!--//app-header-->

    @yield('content')


    <!-- Javascript -->
    <script src="{{ url('admin/assets/plugins/popper.min.js')}}"></script>
    <script src="{{ url('admin/assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

    {{-- <!-- Charts JS -->
    <script src="{{ url('admin/assets/plugins/chart.js/chart.min.js')}}"></script>
    <script src="{{ url('admin/assets/js/index-charts.js')}}"></script> --}}

    <!-- Page Specific JS -->
    <script src="{{ url('admin/assets/js/app.js')}}"></script>

</body>

</html>
