@extends('front.layouts.master')
@section('title')
@section('content')

    <!-- Hero Section Begin -->
    <section class="hero-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="hero-text">
                        <h1>Nea Makri Villas</h1>
                        <p style="background-color: #4eb088; padding:4px; border-radius:5px;">
                            Geçmişi M.Ö 3000’li yıllara dayanan Fethiye Kayaköy’de, Likya yolunun tam da başladığı yerde 3.500 m2 arazi üzerine kurulu Nea Makri Hotel, yemyeşil bir doğanın içinde 6 bungalov evden oluşuyor.</p>
                        <a href="{{route('about')}}" class="primary-btn">Hakkımızda</a>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5 offset-xl-2 offset-lg-1">
                    <div class="booking-form">
                        <h4>Şimdi Rezervasyon Yap!</h4><br>
                        <div class="gallery-item set-bg" data-setbg="{{asset('front/')}}/img/calendar.jpg">
                            <a href="{{route('calendar')}}">
                                <div class="gi-text" style="opacity:1 !important;">
                                <h3>Müsaitlik Takvimi</h3>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero-slider owl-carousel">
            <div class="hs-item set-bg" data-setbg="{{asset('front/')}}/img/neaimage/image00032.jpeg"></div>
            <div class="hs-item set-bg" data-setbg="{{asset('front/')}}/img/neaimage/image00019.jpeg"></div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- About Us Section Begin -->
    <section class="aboutus-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-text">
                        <div class="section-title">
                            <span>Hakkımızda</span>
                            <h2>Nea Makri Villas Kayaköy</h2>
                        </div>
                        <p class="f-para">Fethiye’nin Kayaköy mevkiinde bulunan Nea Makri bungolovları, bir adet ortak havuzu bulunan toplamda 6 adet bungalovdan oluşur.  Her bir bungalov yalıtım, ısıtma ve soğutma faaliyetlerini etkili şekilde gerçekleştiren ahşap mimariye sahiptir. Pastel tonlara ve minimalist tasarıma sahip Nea Makri bungalovları
                            yeşil ve korunaklı bir arazi içerisinde konumlanmaktadır. Kayaköy merkezine yürüyüş mesafesinden dolayı araçsız konaklama düşünen misafirlerimiz için de uygundur. Doğa yürüyüşü yapmayı sevenler için ideal rota seçenekleri bulunan Kayaköy Bölgesi, orman ve dağ manzarası eşliğinde bol oksijenli bir tatil yapmak isteyen misafirlerimiz için uygun bölge seçeneklerimizden birisidir.</p>
                        <a href="{{route('about')}}" class="primary-btn about-btn">Dahası</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-pic">
                        <div class="row">
                            <div class="col-sm-10">
                                <img src="{{asset('front/')}}/img/neaimage/image00002.jpeg">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Us Section End -->
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

    <!-- Services Section End -->
    <section class="services-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Nea Makri de Yaşam</h2>
                        <p>6 adet bungalovdan oluşan villalarımızın 4 tanesi maksimum 2 kişilik, 2 tanesi maksimum 4 kişiliktir.
                            4 adet bungalovda asma kat içerisinde birer yatak odası, ortak alanda ise WC, banyo, klima ve TV bulunmaktadır. 2 adet bungalov ise biri asma katta diğeri alt katta olmak üzere ikişer yatak odasına sahiptir. 4 kişilik bungalovlarımızda bulunan  ortak alan ise açık mutfak, salon, WC, banyo, TV ve klimadan oluşmaktadır. </p>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Dahil Hizmetler</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-6">
                    <div class="service-item">
                        <i class="flaticon-029-wifi"></i>
                        <h4>İnternet Kullanımı</h4>
                        <p></p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="service-item">
                        <i class="flaticon-024-towel"></i>
                        <h4>Giriş Temizliği</h4>
                        <p></p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="service-item">
                        <i class="flaticon-041-lamp"></i>
                        <h4>Elektrik Kullanımı</h4>
                        <p></p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="service-item">
                        <i class="flaticon-044-clock-1"></i>
                        <h4>Tüp Gaz Kullanımı</h4>
                        <p></p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="service-item">
                        <i class="flaticon-007-swimming-pool"></i>
                        <h4>Su Kullanımı</h4>
                        <p></p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="service-item">
                        <i class="flaticon-036-parking"></i>
                        <h4>Havuz Bahçe Bakımı</h4>
                        <p></p>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="section-title">
                        <img src="{{asset('front/')}}/img/neaimage/image00012.jpeg">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Services Section End -->

    <!-- Home Room Section Begin -->
    <section class="hp-room-section">
        <div class="container-fluid">
            <div class="hp-room-items">
                <div class="row">
                    <?php $i=0; ?>
                    @foreach($estates as $estate)
                        <?php $i+=1;
                            if($i<=8){?>
                        <div class="col-lg-3 col-md-6">
                            <a href="{{route('roomsinglepage',[$estate->getEstateCategory->slug, $estate->slug])}}">
                                @php $images = explode('|', $estate->image) @endphp
                            <div class="hp-room-item set-bg" data-setbg="{{ URL::to($images[0]) }}">
                                <div class="hr-text">
                                    <h3>{{$estate->title}}</h3>
                                    <h2>{{$estate->price}} ₺<span> / Gecelik</span></h2>
                                    <table>
                                        <tbody>
                                        <tr>
                                            <td class="r-o">Özellikler</td>
                                            <td>{{$estate->getEstateFeature->features}}</td>
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
                                </div>
                            </div>
                            </a>
                        </div>
                        <?php } ?>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- Home Room Section End -->

    <!-- Blog Section Begin -->
    <section class="blog-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>Fethiye / Kayaköy</span>
                        <h2>Nea Makri Blog</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($articles as $article)
                <div class="col-lg-4">
                    <div class="blog-item set-bg" data-setbg="{{$article->image}}">
                        <div class="bi-text">
                            <span class="b-tag">{{$article->getCategory->name}}</span><br>
                            <h4><a href="{{route('blogsinglepage',[$article->getCategory->slug, $article->slug])}}">{{$article->title}}</a></h4><br>
                            <div class="b-tag"><i class="icon_globe"></i> {{$article->hit}}</div>
                            <div class="b-tag"><i class="icon_clock_alt"></i> {{date('d-m-Y', strtotime($article->created_at))}}</div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Blog Section End -->


@endsection
