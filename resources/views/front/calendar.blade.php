@extends('front.layouts.master')
@section('title',"Nea Makri - Takvim")
@section('content')
    <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h2>Müsaitlik Takvimi</h2>
                        <div class="bt-option">
                            <a href="{{route('homepage')}}">Anasayfa</a>
                            <span>Takvim</span>
                            <br><br>
                        </div>
                        <a href="{{route('rooms')}}"><h3 style="color:#4eb088;">Rezervasyon Yap!</h3></a>
                        <br><br>
                        <div class="container">
                            <div class="row" align="center">
                                <div class="col">
                                    <table>
                                        <tr><td style="background: #FF6F5D; color:white; padding:10px; border-radius: 5px;">
                                               Müsaitilk durumu Bungolov adları karşısındaki rezervasyonlardan son çıkış tarihine göre baz alınır.</td></tr>
                                    </table>
                                </div>
                                <div class="col">
                                    <table>
                                        <tr><td style="background: #7DFF52; color:white; padding:10px; border-radius: 5px;">
                                                Tarih gözükmeyen tüm yerler müsaittir.</td></tr>
                                    </table>
                                </div>
                            </div>
                            <br>
                            <div class="row" align="center">
                                <div class="col">
                                    <table>
                                        <tr><td style="background: #7DFF52; color:white; padding:10px; border-radius: 5px;">
                                                Giriş Saati : 16.00</td></tr>
                                    </table>
                                </div>
                                <div class="col">
                                    <table>
                                        <tr><td style="background: #FF6F5D; color:white; padding:10px; border-radius: 5px;">
                                                Çıkış Saati : 10.00</td></tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold" style="color:#FF5733;"><strong>{{$reservations->count()}}</strong> Aktif Rezervasyon
                <span class="float-right">
        </span>
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th style="color:#FF5733;">Bungolovlar</th>
                        <th>Check-In</th>
                        <th>Check-Out</th>
                        <th>Durum</th>
                    </tr>
                    </thead>
                    <thead>
                    <tr>
                        <th>Nea Makri 1</th>
                        @if(!empty($reservation1))
                        <td style="background: #FF6F5D; color:white;">
                            @foreach($reservation1 as $reservation)
                            {{$reservation->checkin}}<br>
                            @endforeach
                        </td>
                        <td style="background: #FF6F5D; color:white;">
                            @foreach($reservation1 as $reservation)
                                {{$reservation->checkout}}<br>
                            @endforeach
                        </td>
                        @endif
                        @if(!empty($reservation1last))
                        <td style="background: #7DFF52; color:white;">
                            {{$reservation1last->checkout}} 'dan sonra boş<br>
                        </td>
                            @else
                                <td style="background: #7DFF52; color:white;">
                                    Müsait
                                </td>
                            @endif
                    </tr>
                    <tr>
                        <th>Nea Makri 2</th>
                        @if(!empty($reservation2))
                        <td style="background: #FF6F5D; color:white;">
                            @foreach($reservation2 as $reservation)
                                {{$reservation->checkin}}<br>
                            @endforeach
                        </td>
                        <td style="background: #FF6F5D; color:white;">
                            @foreach($reservation2 as $reservation)
                                {{$reservation->checkout}}<br>
                            @endforeach
                        </td>
                        @endif
                        @if(!empty($reservation2last))
                        <td style="background: #7DFF52; color:white;">
                            {{$reservation2last->checkout}} 'dan sonra boş<br>
                        </td>
                            @else
                                <td style="background: #7DFF52; color:white;">
                                    Müsait
                                </td>
                            @endif
                    </tr>
                    <tr>
                        <th>Nea Makri 3</th>
                        @if(!empty($reservation3))
                        <td style="background: #FF6F5D; color:white;">
                            @foreach($reservation3 as $reservation)
                                {{$reservation->checkin}}<br>
                            @endforeach
                        </td>
                        <td style="background: #FF6F5D; color:white;">
                            @foreach($reservation3 as $reservation)
                                {{$reservation->checkout}}<br>
                            @endforeach
                        </td>
                        @endif
                        @if(!empty($reservation3last))
                        <td style="background: #7DFF52; color:white;">
                            {{$reservation3last->checkout}} 'dan sonra boş<br>
                        </td>
                            @else
                                <td style="background: #7DFF52; color:white;">
                                    Müsait
                                </td>
                            @endif
                    </tr>
                    <tr>
                        <th>Nea Makri 4</th>
                       @if(!empty($reservation4))
                        <td style="background: #FF6F5D; color:white;">
                            @foreach($reservation4 as $reservation)
                                {{$reservation->checkin}}<br>
                            @endforeach
                        </td>
                        <td style="background: #FF6F5D; color:white;">
                            @foreach($reservation4 as $reservation)
                                {{$reservation->checkout}}<br>
                            @endforeach
                        </td>
                        @endif
                        @if(!empty($reservation4last))
                        <td style="background: #7DFF52; color:white;">
                            {{$reservation4last->checkout}} 'dan sonra boş<br>
                        </td>
                            @else
                                <td style="background: #7DFF52; color:white;">
                                    Müsait
                                </td>
                            @endif
                    </tr>
                    <tr>
                        <th>Nea Makri 5</th>
                        @if(!empty($reservation5))
                        <td style="background: #FF6F5D; color:white;">
                            @foreach($reservation5 as $reservation)
                                {{$reservation->checkin}}<br>
                            @endforeach
                        </td>
                        <td style="background: #FF6F5D; color:white;">
                            @foreach($reservation5 as $reservation)
                                {{$reservation->checkout}}<br>
                            @endforeach
                        </td>
                        @endif
                        @if(!empty($reservation5last))
                        <td style="background: #7DFF52; color:white;">
                            {{$reservation5last->checkout}} 'dan sonra boş<br>
                        </td>
                            @else
                                <td style="background: #7DFF52; color:white;">
                                    Müsait
                                </td>
                            @endif
                    </tr>
                    <tr>
                        <th>Nea Makri 6</th>
                        @if(!empty($reservation6))
                        <td style="background: #FF6F5D; color:white;">
                            @foreach($reservation6 as $reservation)
                                {{$reservation->checkin}}<br>
                            @endforeach
                        </td>
                        <td style="background: #FF6F5D; color:white;">
                            @foreach($reservation6 as $reservation)
                                {{$reservation->checkout}}<br>
                            @endforeach
                        </td>
                        @endif
                        @if(!empty($reservation6last))
                        <td style="background: #7DFF52; color:white;">
                            {{$reservation6last->checkout}} 'dan sonra boş<br>
                        </td>
                        @else
                            <td style="background: #7DFF52; color:white;">
                                Müsait
                            </td>
                        @endif
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <div class="bt-option">
                            <h3>Giriş - Çıkış Bilgisi</h3><br><br>
                            <p><b>Giriş ve Çıkış Bilgisi:</b> Her villamıza, yeni misafirler öğlen saat 16:00 itibariyle giriş yapabilmektedirler. Çıkış yapacak misafirlerimiz ise sabah 10:00’da çıkış yapmalıdırlar. Bu saat uygulamasının sebebi, mevcuttaki misafirimizin çıkması ile birlikte özel temizlik ekibimizin villaya giriş yapıyor olmasıdır. 10:00’da yapılan çıkıştan, 16:00’da yapılacak olan yeni girişe kadar villamız yeni misafirimiz için özel olarak tamamen temizlenmektedir.
                                <br><br>
                                <b>Ulaşım :</b> Villalarımız tamamen müstakil villalar olduğu için toplu ulaşım hizmeti verilememektedir. Hava yoluyla gelecek misafirlerimiz için en yakın havalimanı Muğla Dalaman Havalimanı’dır, biletlerinizi alırken bunu göz önünde bulundurmanızı rica ederiz. Ücretli transfer veya araç kiralama konusunda ücretli hizmet talep eden misafirlerimiz, satış danışmanlarımızdan destek isteyebilirler. Kara yoluyla ve kendi araçları ile gelecek misafirlerimiz için konum gönderimi ve yol tarifi talep edilirse tarafımızca yapılmaktadır.</p>
                            <br><br>
                        </div>
                        <br><br>
                        <a href="{{route('rooms')}}"><h3 style="color:#4eb088;">Rezervasyon Yap!</h3></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->
@endsection
@section('DifCSS')
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@endsection
@section('DifJS')
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
@endsection
