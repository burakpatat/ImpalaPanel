<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('admin.dashboard')}}">
                <img class="img-fluid" src="{{asset('back/')}}/img/impalaicon.png" style="width:25%;"/>
                &nbsp; Impala Panel
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item @if(Request::segment(2) == 'dashboard') active @endif">
                <a class="nav-link" href="{{route('admin.dashboard')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Emlak İlan Yayını
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link  @if(Request::segment(2) == 'estate') in @else collapsed @endif" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Emlak İlanlar</span>
                </a>
                <div id="collapseTwo" class="collapse  @if(Request::segment(2) == 'estate') show @endif" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">İlan İşlemleri:</h6>
                        <a class="collapse-item @if(Request::segment(2) == 'estate' and !Request::segment(3)) active @endif" href="{{route('estates.index')}}">Tüm İlanlar</a>
                        <a class="collapse-item @if(Request::segment(2) == 'estate' and Request::segment(3) == 'create') active @endif" href="{{route('estates.create')}}">İlan Oluştur</a>
                    </div>
                </div>
            </li>
            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" @if(Request::segment(2) == 'estatecategories') style="color:white!important;" @endif href="{{route('admin.estatecategory.index')}}">
                    <i class="fas fa-fw fa-sign" @if(Request::segment(2) == 'estatecategories') style="color:white!important;" @endif></i>
                    <span>Emlak Kategori</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" @if(Request::segment(2) == 'estatefeatures') style="color:white!important;" @endif href="{{route('estatefeatures.index')}}">
                    <i class="fas fa-fw fa-house-damage" @if(Request::segment(2) == 'estatefeatures') style="color:white!important;" @endif></i>
                    <span>Emlak Özellikleri</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Rezervasyon
            </div>
            <li class="nav-item">
                <a class="nav-link" @if(Request::segment(2) == 'reservation') style="color:white!important;" @endif href="{{route('admin.reservation.index')}}">
                    <i class="fas fa-fw fa-house-damage" @if(Request::segment(2) == 'reservation') style="color:white!important;" @endif></i>
                    <span>Rezervasyonlar</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" @if(Request::segment(2) == 'contactform') style="color:white!important;" @endif href="{{route('admin.contact.index')}}">
                    <i class="fas fa-fw fa-phone" @if(Request::segment(2) == 'contactform') style="color:white!important;" @endif></i>
                    <span>İletişim Formu</span>
                </a>
            </li>




            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Blog İçerik Yönetimi
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link  @if(Request::segment(2) == 'articles') in @else collapsed @endif" href="#" data-toggle="collapse" data-target="#collapseTwo1"
                    aria-expanded="true" aria-controls="collapseTwo1">
                    <i class="fas fa-fw fa-edit"></i>
                    <span>Makaleler</span>
                </a>
                <div id="collapseTwo1" class="collapse  @if(Request::segment(2) == 'articles') show @endif" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Makale İşlemleri:</h6>
                        <a class="collapse-item @if(Request::segment(2) == 'articles' and !Request::segment(3)) active @endif" href="{{route('articles.index')}}">Tüm Makaleler</a>
                        <a class="collapse-item @if(Request::segment(2) == 'articles' and Request::segment(3) == 'create') active @endif" href="{{route('articles.create')}}">Makale Oluştur</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" @if(Request::segment(2) == 'categories') style="color:white!important;" @endif href="{{route('admin.category.index')}}">
                    <i class="fas fa-fw fa-list" @if(Request::segment(2) == 'categories') style="color:white!important;" @endif></i>
                    <span>Kategoriler</span>
                </a>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link  @if(Request::segment(2) == 'pages') in @else collapsed @endif" href="#" data-toggle="collapse" data-target="#collapsePage"
                    aria-expanded="true" aria-controls="collapsePage">
                    <i class="fas fa-fw fa-file"></i>
                    <span>Sayfalar</span>
                </a>
                <div id="collapsePage" class="collapse  @if(Request::segment(2) == 'pages') show @endif" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Sayfa İşlemleri:</h6>
                        <a class="collapse-item @if(Request::segment(2) == 'pages' and !Request::segment(3)) active @endif" href="{{route('admin.page.index')}}">Tüm Sayfalar</a>
                        <a class="collapse-item @if(Request::segment(2) == 'pages' and Request::segment(3) == 'create') active @endif" href="{{route('admin.page.create')}}">Sayfa Oluştur</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Site Ayarları
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{route('admin.config.index')}}">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Ayarlar</span>
                </a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Message -->
            <div class="sidebar-card d-none d-lg-flex">
                <img class="sidebar-card-illustration mb-2" src="{{asset('back/')}}/img/intaps.png" style="width:100%;height:100%;">
                <p class="mb-2 text-center" style="color:white">Impala Software bir Poison Software alt kuruluşudur.</p>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="d-sm-flex align-items-center justify-content-between ">
                            <a target="_blank" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm"><i
                                    class="fas fa-globe fa-sm text-white-50"></i> neamakrikayakoy.com Yönetim Paneli</a>
                        </div>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Auth::user()->name}}</span>
                                <img class="img-profile rounded-circle"
                                    src="{{Auth::user()->image}}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{route('admin.userprofile.index')}}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profil
                                </a>
                                <a class="dropdown-item" href="{{route('admin.config.index')}}">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Ayarlar
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Çıkış
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">@yield('title')</h1>
                        <a href="{{route('homepage')}}" target="_blank" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-eye fa-sm text-white-50"></i> Siteyi Görüntüle</a>
                    </div>

                    <!-- Content Row -->
