<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset("assets/admin/plugins/fontawesome-free/css/all.min.css")}}">
    <!-- IonIcons -->
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset("assets/admin/dist/css/adminlte.min.css")}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    {{--TODO подключить красиво--}}
    <link rel="stylesheet" href="{{asset('assets/admin/plugins/summernote/summernote-bs4.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">

    @yield('content')

    <!-- jQuery -->
    <script src="{{asset("assets/admin/plugins/jquery/jquery.min.js")}}"></script>
    <!-- Bootstrap -->
    <script src="{{asset("assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
    <!-- AdminLTE -->
    <script src="{{asset("assets/admin/dist/js/adminlte.min.js")}}"></script>

</body>
</html>
