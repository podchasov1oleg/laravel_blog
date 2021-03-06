<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="ru"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="ru"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="ru"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="ru"> <!--<![endif]-->

<head>

    @include('includes.head')

</head>

<body>
@if(!empty($page) && $page == 'main')

    @include('includes.header-main')

@elseif(!empty($page) && $page == 'form')

    @include('includes.header-form')

@else

    @include('includes.header')

@endif

<div id="main-content">

@yield('content')

</div>

@include('includes.footer')

</body>

</html>
