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
                            style="font-weight:bolder">{{ $admin_name }}</a></li>
                </ol>
            </nav>
        </div>
    </section>

    {{-- Slide --}}
    <section>
        <div id="demo" class="carousel slide mt-5 ml-5 mr-5 mb-5" data-ride="carousel" data-interval="1500">
            <ul class="carousel-indicators">
                @foreach ($review_most_like as $key => $most_like)
                    <li data-target="#demo" data-slide-to={{ $key }} class={{ $key == 0 ? 'active' : '' }}>
                    </li>
                @endforeach
            </ul>

            <div class="carousel-inner  container">
                @foreach ($review_most_like as $key => $most_like)

                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                        <a href="{{ URL::to('/review/' . $most_like->review_slug) }}">
                                <img src="../uploads/ReviewImage/{{ explode('|', $most_like->review_images)[0] }}"
                                    height="200" width="500">
                        </a>
                        <div class="carousel-caption d-none d-md-block">
                            <a href="{{ URL::to('/review/' . $most_like->review_slug) }}">
                                <h1>{{ $most_like->review_title }}</h1>
                            </a>
                        </div>
                    </div>

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

    {{-- Content --}}
    <section class="homestay mt-5">
        <div class="container p-0">
            <h1 class="mt-5">{{ $admin_name }}</h1>
            <p>Chuyên trang số 1 về Review homestay Việt Nam!</p>
            <div class="row">
                <div class="col-md-8 col-lg-8 col-xl-8 homestay-left ">
                    @foreach ($all_review_author as $key => $review_author)
                        <div class="row mb-4 wow bounceInLeft hs-item">
                            <div class="col-md-5 col-lg-5 col-xl-5 left-img">
                                <a href="{{ URL::to('/review/' . $review_author->review_slug) }}">
                                        <img class="myimg"
                                            src="../uploads/ReviewImage/{{ explode('|', $review_author->review_images)[0] }}">
                                    <div class="homestay-overlay">
                                        <a class="location-tag"
                                            href="{{ URL::to('/location/' . $review_author->location->location_slug) }}">
                                            <h6>{{ $review_author->location->location_name }}</h6>
                                        </a>
                                    </div>
                                    <div class="homestay-overlay-3">
                                        <a class="location-tag"
                                            href="{{ URL::to('/category/' . $review_author->category->category_slug) }}">
                                            <h6>{{ $review_author->category->category_name }}</h6>
                                        </a>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-7 col-lg-7 col-xl-7">
                                <a class="review-title" href="{{ URL::to('/review/' . $review_author->review_slug) }}">
                                    <h4>{{ $review_author->review_title }}</h4>
                                </a>
                                <p>{{ $review_author->review_desc }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="col-md-4 col-lg-4 col-xl-4 homestay-right">
                    <h1 class="mb-5">Bài viết gần đây</h1>
                    @foreach ($lastest_review as $key => $lastest)
                        <div class="ht-right-item">
                            <div class="row " style="padding: 0 16px;">
                                <a href="{{ URL::to('/review/' . $lastest->review_slug) }}">
                                        <img class="myimg"
                                            src="../uploads/ReviewImage/{{ explode('|', $lastest->review_images)[0] }}">
                                </a>
                                <a class="review-title" href="{{ URL::to('/review/' . $lastest->review_slug) }}">
                                    <h4>{{ $lastest->review_title }}</h4>
                                </a>
                                <p>{{ $lastest->review_desc }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

@endsection

<!-- End Phượng -->
