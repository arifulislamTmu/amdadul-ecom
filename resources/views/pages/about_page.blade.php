@extends('layouts.fontend-master')
@section('about') active  @endsection
@section('product_list')  About-us  @endsection

@section('content')

<main class="main">
    <div class="page-header text-center" style="background-image: url('{{asset('frotend') }}/assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">About us <span>Pages</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active" aria-current="page">About us </li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content pb-3">
        @foreach ($about_page as $about)
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="about-text text-center mt-3">
                        <h2 class="title text-center mb-2">{{$about->about_heding  }}</h2><!-- End .title text-center mb-2 -->
                        <p>{{ $about->about_us }} </p>
                        <img src="{{ asset($about->about_image) }}" alt="signature" class="mx-auto mb-5">
                    </div><!-- End .about-text -->
                </div><!-- End .col-lg-10 offset-1 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
        @endforeach
        <div class="mb-2"></div><!-- End .mb-2 -->
        <div class="bg-image pt-7 pb-5 pt-md-12 pb-md-9" style="background-image: url({{asset('frotend') }}/assets/images/backgrounds/bg-4.jpg)">
            <div class="container">
            
                <div class="row">
                    <div class="col-6 col-md-3">
                        <div class="count-container text-center">
                            <div class="count-wrapper text-white">
                                <span class="count" data-from="0" data-to="40" data-speed="3000" data-refresh-interval="50">100</span>k+
                            </div><!-- End .count-wrapper -->
                            <h3 class="count-title text-white">Happy Customer</h3><!-- End .count-title -->
                        </div><!-- End .count-container -->
                    </div><!-- End .col-6 col-md-3 -->

                    <div class="col-6 col-md-3">
                        <div class="count-container text-center">
                            <div class="count-wrapper text-white">
                                <span class="count" data-from="0" data-to="20" data-speed="3000" data-refresh-interval="50">4</span>+
                            </div><!-- End .count-wrapper -->
                            <h3 class="count-title text-white">Years in Business</h3><!-- End .count-title -->
                        </div><!-- End .count-container -->
                    </div><!-- End .col-6 col-md-3 -->

                    <div class="col-6 col-md-3">
                        <div class="count-container text-center">
                            <div class="count-wrapper text-white">
                                <span class="count" data-from="0" data-to="95" data-speed="3000" data-refresh-interval="50">0</span>%
                            </div><!-- End .count-wrapper -->
                            <h3 class="count-title text-white">Return Clients</h3><!-- End .count-title -->
                        </div><!-- End .count-container -->
                    </div><!-- End .col-6 col-md-3 -->

                    <div class="col-6 col-md-3">
                        <div class="count-container text-center">
                            <div class="count-wrapper text-white">
                                <span class="count" data-from="0" data-to="15" data-speed="3000" data-refresh-interval="50">0</span>
                            </div><!-- End .count-wrapper -->
                            <h3 class="count-title text-white">Awards Won</h3><!-- End .count-title -->
                        </div><!-- End .count-container -->
                    </div><!-- End .col-6 col-md-3 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .bg-image pt-8 pb-8 -->

    </div><!-- End .page-content -->
</main><!-- End .main -->

  
@endsection