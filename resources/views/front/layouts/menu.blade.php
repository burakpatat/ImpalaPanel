<!-- Header Section Begin -->
<header class="header-section">
    <div class="top-nav">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <ul class="tn-left">
                        <li><i class="fa fa-phone"></i> (+90) 532 650 9657</li>
                        <li><i class="fa fa-envelope"></i> info@neamakri.com</li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <div class="tn-right">
                        <div class="top-social">
                            <a href="{{$config->facebook}}" target="_blank"><i class="fa fa-facebook"></i></a>
                            <a href="{{$config->twitter}}" target="_blank"><i class="fa fa-twitter"></i></a>
                            <a href="{{$config->linkedin}}" target="_blank"><i class="fa fa-tripadvisor"></i></a>
                            <a href="{{$config->instagram}}" target="_blank"><i class="fa fa-instagram"></i></a>
                        </div>
                        <a href="{{route('calendar')}}" class="bk-btn">Rezervasyon Yap!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="menu-item">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="logo">
                        <a href="{{route('homepage')}}">
                            <img src="{{asset('front/')}}/img/neamlogo1.png">
                        </a>
                    </div>
                </div>
                <div class="col-lg-10" style="margin-top:60px">
                    <div class="nav-menu">
                        <nav class="mainmenu">
                            <ul>
                                <li><a href="{{route('rooms')}}">Odalar</a></li>
                                <li><a href="{{route('about')}}">Hakkımızda</a></li>
                                <li><a href="{{route('blog')}}">Blog</a></li>
                                <li><a href="{{route('contact')}}">İletişim</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Header End -->
