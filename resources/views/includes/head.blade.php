<meta charset="utf-8">
<title>

    @isset($title)
        {{$title}} |
    @endisset

    {{ config('app.name') }}

</title>
<meta name="description" content="">
<link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/news.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/page.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/libs.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/libs/font-awesome/css/all.min.css')}}">
<!-- Header CSS (First Sections of Website: paste after release from _header.min.css here) -->
<style></style>

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<link rel="shortcut icon" href="{{asset('favicon.ico')}}" type="image/x-icon">

<style>
    .preloader {
        position: fixed;
        left: 0;
        top: 0;
        right: 0;
        bottom: 0;
        overflow: hidden;
        /* фоновый цвет */
        background: #e0e0e0;
        z-index: 1001; }

    .preloader__image {
        position: relative;
        top: 50%;
        left: 50%;
        width: 70px;
        height: 70px;
        margin-top: -35px;
        margin-left: -35px;
        text-align: center;
        -webkit-animation: preloader-rotate 2s infinite linear;
        animation: preloader-rotate 2s infinite linear; }

    @-webkit-keyframes preloader-rotate {
        100% {
            -webkit-transform: rotate(360deg);
            transform: rotate(360deg); } }

    @keyframes preloader-rotate {
        100% {
            -webkit-transform: rotate(360deg);
            transform: rotate(360deg); } }

    .loaded_hiding .preloader {
        -webkit-transition: 0.3s opacity;
        -o-transition: 0.3s opacity;
        transition: 0.3s opacity;
        opacity: 0; }

    .loaded .preloader {
        display: none; }
</style>
