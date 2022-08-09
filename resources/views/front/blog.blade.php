@extends('front.layouts.master')
@section('title',"Nea Makri - Blog")
@section('content')
<!-- Breadcrumb Section Begin -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <h2>Blog</h2>
                    <div class="bt-option">
                        <a href="{{route('homepage')}}">Anasayfa</a>
                        <span>Blog</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section End -->

<!-- Blog Section Begin -->
<section class="blog-section blog-page spad">
    <div class="container">
        <div class="row">
            @foreach($articles as $article)
            <div class="col-lg-4 col-md-6">
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
            <div class="col-lg-12">
                <div class="load-more" >
                    {{$articles->links()}}
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Section End -->
@endsection
