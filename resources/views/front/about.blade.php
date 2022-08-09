@extends('front.layouts.master')
@section('title',"Nea Makri - Hakkımızda")
@section('content')
<!-- Breadcrumb Section Begin -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <h2>Hakkımızda</h2>
                    <div class="bt-option">
                        <a href="{{route('homepage')}}">Anasayfa</a>
                        <span>Hakkımızda</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section End -->

<!-- About Us Page Section Begin -->
<section class="aboutus-page-section spad">
    <div class="container">
        <div class="about-page-text">
            <div class="row">
                <div class="col-lg-6">
                    <div class="ap-title">
                        <h2>Nea Makri Fethiye</h2>
                        <p>
                            Fethiye’nin Kayaköy mevkiinde bulunan Nea Makri bungolovları, bir adet ortak havuzu bulunan toplamda 6 adet bungalovdan oluşur.
                            <br>Her bir bungalov yalıtım, ısıtma ve soğutma faaliyetlerini etkili şekilde gerçekleştiren ahşap mimariye sahiptir. Pastel tonlara ve minimalist tasarıma sahip Nea Makri bungalovları yeşil ve korunaklı bir arazi içerisinde konumlanmaktadır.
                            <br>Kayaköy merkezine yürüyüş mesafesinden dolayı araçsız konaklama düşünen misafirlerimiz için de uygundur. Doğa yürüyüşü yapmayı sevenler için ideal rota seçenekleri bulunan Kayaköy Bölgesi, orman ve dağ manzarası eşliğinde bol oksijenli bir tatil yapmak isteyen misafirlerimiz için uygun bölge seçeneklerimizden birisidir.
                        </p>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <img src="{{asset('front/')}}/img/neamfooter.jpg" />
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <h3>Genel Özellikleri</h3><br>
                    <ul class="ap-services">
                        <li><i class="icon_check"></i> Nea Makri, lüks ve modern tasarıma sahip evler 35 m² kestane ağacından yapılmış olup mutfaklıdır. Evler tek katlı veya dubleks konaklama olanları mevcuttur.</li>
                        <li><i class="icon_check"></i> Tarihi destinasyon</li>
                        <li><i class="icon_check"></i> Doğa manzarası</li>
                        <li><i class="icon_check"></i> Şehir Merkezine 3 Km</li>
                        <li><i class="icon_check"></i> DALAMAN Havalimanı 60 Km</li>
                    </ul>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <h3>Plaj Özellikleri</h3><br>
                    <ul class="ap-services">
                        <li><i class="icon_check"></i> Plaja 4 kilometre</li>
                        <li><i class="icon_check"></i> Halka açık plaj</li>
                        <li><i class="icon_check"></i> Şezlong & Şemsiye ÜCRETLİ</li>
                        <li><i class="icon_check"></i> Kum, çakıl karışık plaj</li>
                        <li><i class="icon_check"></i> Mavi Bayrak</li>
                        <li><i class="icon_check"></i> Kıyıda sığ deniz</li>
                        <li><i class="icon_check"></i> Beach Bar</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About Us Page Section End -->

<!-- Video Section Begin -->
<section class="video-section set-bg" data-setbg="{{asset('front/')}}/img/video-bg.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="video-text">
                    <h2>Nea Makri'yi Keşif Edin!</h2>
                    <p>Kayaköy Bölgesi, orman ve dağ manzarası eşliğinde bol oksijenli bir tatil yapmak isteyen misafirlerimiz için uygun bölge seçeneklerimizden birisidir.</p>
                    <a href="{{asset('front/')}}/img/neavideo.mp4" class="play-btn video-popup"><img
                            src="{{asset('front/')}}/img/play.png" alt=""></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Video Section End -->

<!-- Gallery Section Begin -->
<section class="gallery-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="gallery-item set-bg" data-setbg="{{asset('front/')}}/img/neaimage/image00032.jpeg"></div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="gallery-item set-bg" data-setbg="{{asset('front/')}}/img/neaimage/image00015.jpeg"></div>
                    </div>
                    <div class="col-sm-6">
                        <div class="gallery-item set-bg" data-setbg="{{asset('front/')}}/img/neaimage/image00014.jpeg"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="gallery-item large-item set-bg" data-setbg="{{asset('front/')}}/img/neaimage/image00029.jpeg"></div>
            </div>
        </div>
    </div>
</section>
<!-- Gallery Section End -->
@endsection
