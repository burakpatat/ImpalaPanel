<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fethiye’nin Kayaköy mevkiinde bulunan Nea Makri bungolovları, bir adet ortak havuzu bulunan toplamda 6 adet bungalovdan oluşur. Her bir bungalov yalıtım, ısıtma ve soğutma faaliyetlerini etkili şekilde gerçekleştiren ahşap mimariye sahiptir. ">
    <meta name="keywords" content="Nea Makri, Kayaköy, Fethiye, Bungolov">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Nea Makri')</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cabin:400,500,600,700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Glory:400,500,600,700&display=swap" rel="stylesheet">

    <link rel="shortcut icon" href="{{asset('front/')}}/img/neaicon.png" type="image/x-icon" />

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{asset('front/')}}/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="{{asset('front/')}}/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="{{asset('front/')}}/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="{{asset('front/')}}/css/flaticon.css" type="text/css">
    <link rel="stylesheet" href="{{asset('front/')}}/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="{{asset('front/')}}/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="{{asset('front/')}}/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="{{asset('front/')}}/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="{{asset('front/')}}/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="{{asset('front/')}}/css/style.css" type="text/css">
    @yield('DifCSS')

</head>

<body>
<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

<!-- Offcanvas Menu Section Begin -->
<div class="offcanvas-menu-overlay"></div>
<div class="canvas-open">
    <i class="icon_menu"></i>
</div>
<div class="offcanvas-menu-wrapper">
    <div class="canvas-close">
        <i class="icon_close"></i>
    </div>
    <div class="header-configure-area">
        <a href="{{route('calendar')}}" class="bk-btn">Rezervasyon Yap!</a>
    </div>
    <nav class="mainmenu mobile-menu">
        <ul>
            <li><a href="{{route('homepage')}}">Anasayfa</a></li>
            <li><a href="{{route('rooms')}}">Odalar</a></li>
            <li><a href="{{route('about')}}">Hakkımızda</a></li>
            <li><a href="{{route('blog')}}">Blog</a></li>
            <li><a href="{{route('contact')}}">İletişim</a></li>
        </ul>
    </nav>
    <div id="mobile-menu-wrap"></div>
    <div class="top-social">
        <a href="{{$config->facebook}}" target="_blank"><i class="fa fa-facebook"></i></a>
        <a href="{{$config->twitter}}" target="_blank"><i class="fa fa-twitter"></i></a>
        <a href="{{$config->linkedin}}" target="_blank"><i class="fa fa-tripadvisor"></i></a>
        <a href="{{$config->instagram}}" target="_blank"><i class="fa fa-instagram"></i></a>
    </div>
    <ul class="top-widget">
        <li><i class="fa fa-phone"></i> (+90) 532 650 9657</li>
        <li><i class="fa fa-envelope"></i> info@neamakri.com</li>
    </ul>
</div>
<!-- Offcanvas Menu Section End -->
