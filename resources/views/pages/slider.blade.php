@extends('layouts.fontend-master')
@section('slider')
<div class="intro-section bg-lighter pt-5 pb-6">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="intro-slider-container slider-container-ratio slider-container-1 mb-2 mb-lg-0">
                    <div class="intro-slider intro-slider-1 owl-carousel owl-simple owl-light owl-nav-inside" data-toggle="owl" data-owl-options='{
                            "nav": false, 
                            "responsive": {
                                "768": {
                                    "nav": true
                                }
                            }
                        }'>
                        <div class="intro-slide">
                            <figure class="slide-image">
                                <picture>
                                    <source media="(max-width: 480px)" srcset="{{asset('frotend') }}/assets/images/slider/slide-1-480w.jpg">
                                    <img src="{{asset('frotend') }}/assets/images/slider/slide-1.jpg" alt="Image Desc">
                                </picture>
                            </figure><!-- End .slide-image -->

                            <div class="intro-content">
                                <h3 class="intro-subtitle">Topsale Collection</h3><!-- End .h3 intro-subtitle -->
                                <h1 class="intro-title">Living Room<br>Furniture</h1><!-- End .intro-title -->

                                <a href="category.html" class="btn btn-outline-white">
                                    <span>SHOP NOW</span>
                                    <i class="icon-long-arrow-right"></i>
                                </a>
                            </div><!-- End .intro-content -->
                        </div><!-- End .intro-slide -->

                        <div class="intro-slide">
                            <figure class="slide-image">
                                <picture>
                                    <source media="(max-width: 480px)" srcset="{{asset('frotend') }}/assets/images/slider/slide-2-480w.jpg">
                                    <img src="{{asset('frotend') }}/assets/images/slider/slide-2.jpg" alt="Image Desc">
                                </picture>
                            </figure><!-- End .slide-image -->

                            <div class="intro-content">
                                <h3 class="intro-subtitle">News and Inspiration</h3><!-- End .h3 intro-subtitle -->
                                <h1 class="intro-title">New   Arrivals</h1><!-- End .intro-title -->

                                <a href="category.html" class="btn btn-outline-white">
                                    <span>SHOP NOW</span>
                                    <i class="icon-long-arrow-right"></i>
                                </a>
                            </div><!-- End .intro-content -->
                        </div><!-- End .intro-slide -->

                        <div class="intro-slide">
                            <figure class="slide-image">
                                <picture>
                                    <source media="(max-width: 480px)" srcset="{{asset('frotend') }}/assets/images/slider/slide-3-480w.jpg">
                                    <img src="{{asset('frotend') }}/assets/images/slider/slide-3.jpg" alt="Image Desc">
                                </picture>
                            </figure><!-- End .slide-image -->

                            <div class="intro-content">
                                <h3 class="intro-subtitle">Outdoor Furniture</h3><!-- End .h3 intro-subtitle -->
                                <h1 class="intro-title">Outdoor Dining <br>Furniture</h1><!-- End .intro-title -->

                                <a href="category.html" class="btn btn-outline-white">
                                    <span>SHOP NOW</span>
                                    <i class="icon-long-arrow-right"></i>
                                </a>
                            </div><!-- End .intro-content -->
                        </div><!-- End .intro-slide -->
                    </div><!-- End .intro-slider owl-carousel owl-simple -->
                    
                    <span class="slider-loader"></span><!-- End .slider-loader -->
                </div><!-- End .intro-slider-container -->
            </div><!-- End .col-lg-8 -->
            <div class="col-lg-4">
                <div class="intro-banners">
                    <div class="row row-sm">
                        <div class="col-md-6 col-lg-12">
                            <div class="banner banner-display">
                                <a href="#">
                                    <img src="{{asset('frotend') }}/assets/images/banners/home/intro/banner-1.jpg" alt="Banner">
                                </a>

                                <div class="banner-content">
                                    <h4 class="banner-subtitle text-darkwhite"><a href="#">Clearence</a></h4><!-- End .banner-subtitle -->
                                    <h3 class="banner-title text-white"><a href="#">Chairs & Chaises <br>Up to 40% off</a></h3><!-- End .banner-title -->
                                    <a href="#" class="btn btn-outline-white banner-link">Shop Now<i class="icon-long-arrow-right"></i></a>
                                </div><!-- End .banner-content -->
                            </div><!-- End .banner -->
                        </div><!-- End .col-md-6 col-lg-12 -->

                        <div class="col-md-6 col-lg-12">
                            <div class="banner banner-display mb-0">
                                <a href="#">
                                    <img src="{{asset('frotend') }}/assets/images/banners/home/intro/banner-2.jpg" alt="Banner">
                                </a>

                                <div class="banner-content">
                                    <h4 class="banner-subtitle text-darkwhite"><a href="#">New in</a></h4><!-- End .banner-subtitle -->
                                    <h3 class="banner-title text-white"><a href="#">Best Lighting <br>Collection</a></h3><!-- End .banner-title -->
                                    <a href="#" class="btn btn-outline-white banner-link">Discover Now<i class="icon-long-arrow-right"></i></a>
                                </div><!-- End .banner-content -->
                            </div><!-- End .banner -->
                        </div><!-- End .col-md-6 col-lg-12 -->
                    </div><!-- End .row row-sm -->
                </div><!-- End .intro-banners -->
            </div><!-- End .col-lg-4 -->
        </div><!-- End .row -->

        <div class="mb-6"></div><!-- End .mb-6 -->

        <div class="owl-carousel owl-simple" data-toggle="owl" 
            data-owl-options='{
                "nav": false, 
                "dots": false,
                "margin": 30,
                "loop": false,
                "responsive": {
                    "0": {
                        "items":2
                    },
                    "420": {
                        "items":3
                    },
                    "600": {
                        "items":4
                    },
                    "900": {
                        "items":5
                    },
                    "1024": {
                        "items":6
                    }
                }
            }'>
            <a href="#" class="brand">
                <img src="{{asset('frotend') }}/assets/images/brands/1.png" alt="Brand Name">
            </a>

            <a href="#" class="brand">
                <img src="{{asset('frotend') }}/assets/images/brands/2.png" alt="Brand Name">
            </a>

            <a href="#" class="brand">
                <img src="{{asset('frotend') }}/assets/images/brands/3.png" alt="Brand Name">
            </a>

            <a href="#" class="brand">
                <img src="{{asset('frotend') }}/assets/images/brands/4.png" alt="Brand Name">
            </a>

            <a href="#" class="brand">
                <img src="{{asset('frotend') }}/assets/images/brands/5.png" alt="Brand Name">
            </a>

            <a href="#" class="brand">
                <img src="{{asset('frotend') }}/assets/images/brands/6.png" alt="Brand Name">
            </a>
        </div><!-- End .owl-carousel -->
    </div><!-- End .container -->
</div>
@endsection