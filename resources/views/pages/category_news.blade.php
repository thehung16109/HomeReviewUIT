<!-- Phượng -->
@extends('pages_layout')
@section('content')
    {{-- Breadcrumb --}}
    <section>
        <div class="container px-0 mt-4">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-light" href="{{ URL::to('/trang-chu') }}">Trang chủ</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page"><a class="text-light"
                            style="font-weight:bolder">Tin tức</a></li>
                </ol>
            </nav>
        </div>
    </section>

    {{-- Slide --}}
    <section>
        <div id="demo" class="carousel slide mt-5 ml-5 mr-5 mb-5" data-ride="carousel" data-interval="1500">
            <ul class="carousel-indicators">
                @foreach ($news_most_like as $key => $most_like)
                    <li data-target="#demo" data-slide-to={{ $key }} class={{ $key == 0 ? 'active' : '' }}></li>
                @endforeach
            </ul>

            <div class="carousel-inner container p-0">
                @foreach ($news_most_like as $key => $most_like)
                    <a href="{{ URL::to('/news/' . $most_like->news_slug) }}">
                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                <img src="../uploads/NewsImage/{{ explode('|', $most_like->news_images)[0] }}"
                                    height="200" width="500">
                            <div class="carousel-caption d-none d-md-block">
                                <a href="{{ URL::to('/news/' . $most_like->news_slug) }}"><h1>{{ $most_like->news_title }}</h1></a>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>
    </section>

    <section class="homestay mt-5">
        <div class="container p-0">
            <h1 class="mt-5">Tin tức</h1>
            <div class="row mt-5">
                <div class="col-md-8 col-lg-8 col-xl-8 homestay-left ">
                    @foreach ($all_news as $key => $news)
                        <div class="row mb-4 wow bounceInLeft hs-item">
                            <div class="col-md-5 col-lg-5 col-xl-5 left-img">
                                <a href="{{ URL::to('/news/' . $news->news_slug) }}">
                                        <img class="myimg"
                                            src="../uploads/NewsImage/{{ explode('|', $news->news_images)[0] }}">
                                </a>
                            </div>
                            <div class="col-md-7 col-lg-7 col-xl-7">
                                <a href="">
                                    <a class="review-title"
                                        href="{{ URL::to('/news/' . $news->news_slug) }}">
                                        <h4>{{ $news->news_title }}</h4>
                                    </a>
                                </a>
                                <p>{{ $news->news_desc }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="col-md-4 col-lg-4 col-xl-4 homestay-right">
                    <h4 class="mb-5">Tin tức nhiều người quan tâm</h4>
                    @foreach ($most_view_news as $key => $most_view)
                        <div class="ht-right-item">
                            <div class="row " style="padding: 0 16px;">
                                <a href="{{ URL::to('/news/' . $most_view->news_slug) }}">
                                        <img class="myimg"
                                            src="../uploads/NewsImage/{{ explode('|', $most_view->news_images)[0] }}">
                                </a>
                                <a class="review-title" href="{{ URL::to('/news/' . $most_view->news_slug) }}">
                                    <h4>{{ $most_view->news_title }}</h4>
                                </a>
                                <p>{{ $most_view->news_desc }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            
        </div>
    </section>

@endsection

<!-- End Phượng -->
