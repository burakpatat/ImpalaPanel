@extends('front.layouts.master')
@section('title',$articles->title)
@section('content')
    <!-- Blog Details Hero Section Begin -->
    <section class="blog-details-hero set-bg" data-setbg="{{$articles->image}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="bd-hero-text">
                        <span>{{$articles->getCategory->name}}</span>
                        <h2>{{$articles->title}}</h2>
                        <ul>
                            <span><li class="b-time" style="color:white !important;"><i class="icon_globe"></i> {{$articles->hit}}</li></span>
                        </ul>
                        <ul>
                            <span><li class="b-time" style="color:white !important;"><i class="icon_clock_alt"></i> {{date('d-m-Y', strtotime($articles->created_at))}}</li></span>
                        </ul>
                    </li>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Hero End -->

    <!-- Blog Details Section Begin -->
    <section class="blog-details-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="blog-details-text">
                        <div class="bd-more-text">
                            {!! $articles->content !!}
                        </div>
                        <div class="tag-share">
                            <div class="tags">
                                <a href="#">Travel Trip</a>
                                <a href="#">Camping</a>
                                <a href="#">Event</a>
                            </div>
                            <div class="social-share">
                                <span>Share:</span>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-tripadvisor"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-youtube-play"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Section End -->

    <!-- Recommend Blog Section Begin -->
    <section class="recommend-blog-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Önerilenler</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($articles2 as $article)
                <div class="col-md-4">
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
    <!-- Recommend Blog Section End -->
@endsection
