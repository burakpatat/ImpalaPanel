@extends('front.layouts.master')
@section('title',"Nea Makri - Odalar")
@section('content')
    <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h2>Odalar</h2>
                        <div class="bt-option">
                            <a href="{{route('homepage')}}">Anasayfa</a>
                            <span>Odalar</span>
                        </div>
                        <br>
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{session('success')}}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <!-- Rooms Section Begin -->
    <section class="rooms-section spad">
        <div class="container">
            <div class="row">
                @foreach($estates as $estate)
                <div class="col-lg-4 col-md-6">
                    <div class="room-item">
                        @php $images = explode('|', $estate->image) @endphp
                        <img src="{{ URL::to($images[0]) }}">
                        <div class="ri-text">
                            <h4><a href="{{route('roomsinglepage',[$estate->getEstateCategory->slug, $estate->slug])}}" style="color:black;">
                                    {{$estate->title}}</a></h4>
                            <h3>{{$estate->price}} ₺<span>/ Gecelik</span></h3>
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
                                        ?></td>
                                </tr>
                                <tr>
                                    <td class="r-o">Oda Genişliği:</td>
                                    <td>{{$estate->getEstateInfo->room}}</td>
                                </tr>
                                <tr>
                                    <td class="r-o">Yatak:</td>
                                    <td>{{$estate->getEstateInfo->bedroom}}</td>
                                </tr>
                                <tr>
                                    <td class="r-o">Banyo:</td>
                                    <td>{{$estate->getEstateInfo->bathroom}}</td>
                                </tr>
                                <tr>
                                    <td class="r-o">Isıtma:</td>
                                    <td>{{$estate->getEstateInfo->heating}}</td>
                                </tr>
                                <tr>
                                    <td>{{$estate->getEstateInfo->person}} Kişiliktir.</td>
                                </tr>
                                </tbody>
                            </table>
                            <a href="{{route('roomsinglepage',[$estate->getEstateCategory->slug, $estate->slug])}}" class="primary-btn">Detaylar..</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Rooms Section End -->
@endsection
