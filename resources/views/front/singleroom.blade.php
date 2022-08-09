@extends('front.layouts.master')
@section('title',$estates->title)
@section('content')
<!-- Breadcrumb Section Begin -->
<div class="breadcrumb-section" xmlns="http://www.w3.org/1999/html">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <h2>Odalar</h2>
                    <div class="bt-option">
                        <a href="{{route('homepage')}}">Anasayfa</a>
                        <span>Odalar</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section End -->

<!-- Room Details Section Begin -->
<section class="room-details-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="room-details-item">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            @php $images = explode('|', $estates->image); @endphp
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="{{ URL::to($images[0]) }}" />
                            </div>
                            @for($i=1;$i<count($images);$i++)
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="{{ URL::to($images[$i]) }}" />
                                </div>
                            @endfor
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    <div class="rd-text">
                        <div class="rd-title">
                            <h3>{{$estates->title}}</h3>
                            <div class="rdt-right">
                                <h2>{{$estates->price}} ₺<span>/ Gecelik</span></h2>
                            </div>
                        </div>
                        <table>
                            <tbody>
                            <tr>
                                <td class="r-o">Özellikler</td>
                                <td>
                                    <?php
                                    $i=-1;
                                    foreach ($estatefeature as $esfeature){
                                        $i+=1;
                                    echo $estatefeature[$i]->features. ', ';
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="r-o">Oda Genişliği:</td>
                                <td>{{$estates->getEstateInfo->room}}</td>
                            </tr>
                            <tr>
                                <td class="r-o">Yatak:</td>
                                <td>{{$estates->getEstateInfo->bedroom}}</td>
                            </tr>
                            <tr>
                                <td class="r-o">Banyo:</td>
                                <td>{{$estates->getEstateInfo->bathroom}}</td>
                            </tr>
                            <tr>
                                <td class="r-o">Isıtma:</td>
                                <td>{{$estates->getEstateInfo->heating}}</td>
                            </tr>
                            <tr>
                                <td>{{$estates->getEstateInfo->person}} Kişiliktir.</td>
                            </tr>
                            </tbody>
                        </table>
                        <p class="f-para">
                            {!! $estates->description !!}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="room-booking">
                    <h3>Rezervasyon Yap</h3>
                    <form method="post" action="{{route('reservation.post')}}">
                        @csrf
                        <div class="select-option">
                            <label for="guest">Hangi Villa da Konaklamak İstiyorsunuz?</label>
                            <select id="guest" name="villanumber">
                                @foreach($estates2 as $estate)
                                <option value="{{$estate->id}}">{{$estate->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="check-date">
                            <label for="date-in">Giriş:</label>
                            <input type="text" class="date-input" id="date-in" name="checkin">
                            <i class="icon_calendar" style="margin-bottom: 25px !important;"></i>
                        </div>
                        <div class="check-date">
                            <label for="date-out">Çıkış:</label>
                            <input type="text" class="date-input" id="date-out" name="checkout">
                            <i class="icon_calendar" style="margin-bottom: 25px !important;"></i>
                        </div>
                        <div class="select-option">
                            <label for="guest">Kişi Sayısı:</label>
                            <select id="guest" name="personcount">
                                <option value="1">1 Kişi</option>
                                <option value="2">2 Kişi</option>
                                <option value="3">3 Kişi</option>
                                <option value="4">4+ Kişi</option>
                            </select>
                        </div>
                        <div class="input">
                            <label>Ad Soyad:</label>
                            <input type="text" name="name">
                        </div>
                        <div class="input">
                            <label>E-Mail:</label>
                            <input type="text" name="email">
                        </div>
                        <div class="input">
                            <label>Telefon Numarası:</label>
                            <input type="text" name="phone">
                        </div>
                        <button type="submit">Rezervasyon Yap!</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Room Details Section End -->
@endsection
@section('DifJS')
<script>
    var dates = [];
    <?php
        $i=-1;
        foreach ($calendars as $calendar){
        $i+=1;
    ?>
        dates.push("{{date('d-m-Y',strtotime($calendars[$i]->checkin))}}");
        dates.push("{{date('d-m-Y',strtotime($calendars[$i]->checkout))}}");
        <?php
        $Checkin = strtotime($calendars[$i]->checkin);
        $Checkout = strtotime($calendars[$i]->checkout);
        $CheckInD = idate('d', $Checkin);
        $CheckInM = idate('m', $Checkin);
        $CheckInY = idate('Y', $Checkin);
        $CheckOutD = idate('d', $Checkout);
        $CheckOutM = idate('m', $Checkout);
        $CheckOutY = idate('y', $Checkout);
        ?>
        <?php
        if($CheckInD>$CheckOutD){
            $CheckInD=1;
            $CheckInM = $CheckInM + 1;
        }
        if($CheckInM>$CheckOutM){
            $CheckInM=1;
            $CheckInY = $CheckInY + 1;
        }
        ?>
        @for($d=$CheckInD;$d<=$CheckOutD;$d++)
            dates.push("{{date('d-m-Y',strtotime($d.'-'.$CheckInM.'-'.$CheckInY))}}");
        @endfor
    <?php }?>

    function disableDates(date) {
        var string = $.datepicker.formatDate('dd-mm-yy', date);
        return [dates.indexOf(string) == -1];
    }
    $(".date-input").datepicker({
        minDate: 0,
        dateFormat: 'd-m-yy',
        beforeShowDay: disableDates
    });
</script>
@endsection

