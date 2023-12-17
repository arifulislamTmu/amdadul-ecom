@extends('layouts.fontend-master')
@section('home') active  @endsection
@section('product_list')  Sellspoints.com  @endsection

@section('content')
<style>
    .btn-outline-white {
  
     background: #c96 !important; 
}
</style>

<main class="main">
    <div class="intro-section bg-lighter pt-5 pb-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="intro-slider-container slider-container-ratio slider-container-1 mb-2 mb-lg-0">
                        <div class="intro-slider intro-slider-1 owl-carousel owl-simple owl-light owl-nav-inside" data-toggle="owl" data-owl-options='{
                                "nav": true, 
                                "responsive": {
                                    "768": {
                                        "nav": true
                                    }
                                }
                            }'>
                            @foreach ($sliders as $slider )
                            <div class="intro-slide">
                                <figure class="slide-image">
                                    <picture>
                                        <source media="(max-width: 480px)" srcset="{{asset($slider->product_img_one) }}">
                                        <img src="{{asset($slider->product_img_one) }}" alt="Image Desc">
                                    </picture>
                                </figure><!-- End .slide-image -->

                                <div class="intro-content">
                                    <h1 class="intro-title">{{ $slider->category->category_name }}</h1><!-- End .intro-title -->
                                        <form action="{{ route('search.product') }}" method="get">
                                            @csrf
                                            <input type="hidden"  name="search_product" value="{{ $slider->category->category_name }}">
                                            <button type="submit" class="btn btn-outline-white">
                                           <span>SHOP NOW</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </button>
                                   </form>
                                </div>
                            </div>
                            @endforeach
                        </div><!-- End .intro-slider owl-carousel owl-simple -->
                        
                        <span class="slider-loader"></span><!-- End .slider-loader -->
                    </div><!-- End .intro-slider-container -->
                </div><!-- End .col-lg-8 -->
                <div class="col-lg-4">
                    <div class="intro-banners">
                        <div class="row row-sm">
                            @foreach ($side_sliders as $side_slider )
                            <div class="col-md-6 col-lg-12">
                                <div class="banner banner-display">
                                    <a href="#">
                                        <img src="{{asset($side_slider->product_img_two) }}" alt="Banner">
                                    </a>
                                 
                                        <div class="banner-content">
                                            <h1 class="intro-title d-none">{{ $side_slider->product_name }}</h1><!-- End .intro-title -->
                                                <form action="{{ route('search.product') }}" method="get">
                                                    @csrf
                                                    <input type="hidden"  name="search_product" value="{{ $slider->category->category_name }}">
                                                    <button type="submit" class="btn btn-outline-white">
                                                   <span>SHOP NOW</span>
                                                <i class="icon-long-arrow-right"></i>
                                            </button>
                                           </form>
                                        </div>
                                
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            {{-- <div class="mb-6"></div> --}}

            {{-- <div class="owl-carousel owl-simple" data-toggle="owl" 
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
                }'> --}}
                {{-- <a href="#" class="brand">
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
                </a> --}}
            </div>
        </div>
    </div>
    <div class="container">
        <div class="heading heading-center mb-6">
            <h2 class="title">Recent Arrivals</h2><!-- End .title -->
            <ul class="nav nav-pills nav-border-anim justify-content-center" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="top-all-link" data-toggle="tab" href="#top-all-tab" role="tab" aria-controls="top-all-tab" aria-selected="true">All</a>
                </li>
                @foreach ($categoris as $category)
                <li class="nav-item">
                    <a class="nav-link" id="top-fur-link" data-toggle="tab" href="#category-tab{{ $category->id }}" role="tab" aria-controls="top-fur-tab" aria-selected="false">{{ $category->category_name }}</a>
                </li>
              @endforeach
            </ul>
        </div><!-- End .heading -->

        <div class="tab-content">
            <div class="tab-pane p-0 fade show active" id="top-all-tab" role="tabpanel" aria-labelledby="top-all-link">
                <div class="products">
                    <div class="row justify-content-center">
                        @foreach ($products as $product )
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="product product-11 mt-v3 text-center product_data">
                                <figure class="product-media">
                                   
                                    <a href="{{ route('product.details',$product->id) }}">
                                        <img src="{{asset($product->product_img_one) }}" alt="{{ $product->product_name }}" class="product-image">
                                        <img src="{{asset($product->product_img_two) }}" alt="" class="product-image-hover">
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="{{ url('add/wishlist/'.$product->id) }}" class="btn-product-icon btn-wishlist "><span>add to wishlist</span></a>
                                    </div>
                                </figure>

                                <div class="product-body">
                                    <h3 class="product-title"><a href="{{  route('product.details',$product->id) }}">{{ $product->product_name }} </a></h3><!-- End .product-title -->
                                    <div class="product-price">
                                        <span>&#2547; </span>&nbsp;   {{ number_format($product->product_price,2) }}
                                    </div><!-- End .product-price -->
                                </div><!-- End .product-body -->
                                <div class="product-action">
                                    <button class="btn-product btn-cart cart_btn_click" href="#product_details" data-toggle="modal" ><span>BUY NOW</span></button>
                                    <input type="hidden" class="product_input_id"  value="{{ $product->id }}">
                                </div><!-- End .product-action -->
                            </div><!-- End .product -->
                        </div>
                        @endforeach
                    </div><!-- End .row -->
                </div><!-- End .products -->
            </div><!-- .End .tab-pane -->
   
        


        @foreach ($categoris as $cate)
        @php
             $products_category = App\Product::where('category_name',$cate->id)->latest()->get();
        @endphp
            <div class="tab-pane p-0 fade" id="category-tab{{ $cate->id}}" role="tabpanel" aria-labelledby="top-fur-link">
                <div class="products">
                    <div class="row justify-content-center">
                        @foreach ($products_category as $products_t)
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="product product-11 mt-v3 text-center product_data">
                                <figure class="product-media">
                                    <span class="product-label label-new">NEW</span>
                                    <a href="{{  route('product.details',$products_t->id)  }}">
                                        <img src="{{asset($products_t->product_img_one) }}" alt="{{ $products_t->product_name }}" class="product-image">
                                        <img src="{{asset($products_t->product_img_two) }}" alt="" class="product-image-hover">
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist "><span>add to wishlist</span></a>
                                    </div><!-- End .product-action-vertical -->
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <h3 class="product-title"><a href="{{   route('product.details',$product->id)  }}">{{ $products_t->product_name }}</a></h3><!-- End .product-title -->
                                    <div class="product-price">
                                        <span>&#2547; </span>&nbsp;    {{ number_format($products_t->product_price,2) }} 
                                    </div><!-- End .product-price -->
                                </div><!-- End .product-body -->
                                <div class="product-action">
                                    <button class="btn-product btn-cart cart_btn_click" href="#product_details" data-toggle="modal" ><span>BUY NOW</span></button>
                                    <input type="hidden" class="product_input_id"  value="{{ $products_t->id }}">
                                </div><!-- End .product-action -->
                            </div><!-- End .product -->
                        </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
                        @endforeach
                    </div><!-- End .row -->
                </div><!-- End .products -->
            </div><!-- .End .tab-pane -->
            @endforeach
        </div><!-- End .tab-content -->
    </div><!-- End .container -->
    <div class="container">
        <div class="heading heading-center mb-3">
            <h2 class="title-lg">Trendy Products</h2><!-- End .title -->
       

            <ul class="nav nav-pills justify-content-center" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="trendy-all-link" data-toggle="tab" href="#trendy-all-tab" role="tab" aria-controls="trendy-all-tab" aria-selected="true">All</a>
                </li>
                @foreach ($brands as $brand)
                <li class="nav-item">
                    <a class="nav-link" id="category_product" data-toggle="tab" href="#brand-tab{{ $brand->id }}" role="tab" aria-controls="" aria-selected="false">{{ $brand->brand_name }}</a>
                </li>
                @endforeach
            </ul>
        </div><!-- End .heading -->

        <div class="tab-content tab-content-carousel">
            <div class="tab-pane p-0 fade show active" id="trendy-all-tab" role="tabpanel" aria-labelledby="trendy-all-link">
                <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                    data-owl-options='{
                        "nav": false, 
                        "dots": true,
                        "margin": 20,
                        "loop": false,
                        "responsive": {
                            "0": {
                                "items":2
                            },
                            "480": {
                                "items":2
                            },
                            "768": {
                                "items":3
                            },
                            "992": {
                                "items":4
                            },
                            "1200": {
                                "items":4,
                                "nav": true,
                                "dots": false
                            }
                        }
                    }'>
                    @foreach ($products_brand as $product)
                    <div class="product product-11 text-center product_data">
                        <figure class="product-media">
                            <a href="{{  route('product.details',$product->id)  }}">
                                <img src="{{asset($product->product_img_one) }}" alt="{{ $product->product_name }}" class="product-image">
                                <img src="{{asset($product->product_img_two) }}" alt="" class="product-image-hover">
                            </a>
                        </figure>
                        <div class="product-body">
                            <h3 class="product-title"><a href="{{   route('product.details',$product->id)   }}">{{ $product->product_name }}</a></h3><!-- End .product-title -->
                            <div class="product-price">
                                <span>&#2547; </span>&nbsp; {{ number_format($product->product_price,2) }}
                            </div>
                        </div>
                        <div class="product-action">
                            <button class="btn-product btn-cart cart_btn_click" href="#product_details" data-toggle="modal" ><span>BUY NOW</span></button>
                            <input type="hidden" class="product_input_id"  value="{{ $product->id }}">
                        </div>
                    </div>
                    @endforeach

                </div><!-- End .owl-carousel -->
            </div><!-- .End .tab-pane -->
            @foreach ($brands as $brand)
            @php
                 $products_cat = App\Product::where('brand_name',$brand->id)->latest()->get();
            @endphp
           
            <div class="tab-pane p-0 fade" id="brand-tab{{ $brand->id }}" role="tabpanel" aria-labelledby="">
                <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                    data-owl-options='{
                        "nav": false, 
                        "dots": true,
                        "margin": 20,
                        "loop": false,
                        "responsive": {
                            "0": {
                                "items":2
                            },
                            "480": {
                                "items":2
                            },
                            "768": {
                                "items":3
                            },
                            "992": {
                                "items":4
                            },
                            "1200": {
                                "items":4,
                                "nav": true,
                                "dots": false
                            }
                        }
                    }'>
                    @foreach ($products_cat as $products_t)
                    <div class="product product-11 text-center product_data">
                        <figure class="product-media">
                            <span class="product-label label-new">NEW</span>
                            <a href="{{ route('product.details',$products_t->id)  }}">
                                <img src="{{asset($products_t->product_img_one) }}" alt="{{ $products_t->product_name }}" class="product-image">
                                <img src="{{asset($products_t->product_img_two) }}" alt="{{ $products_t->product_name }}" class="product-image-hover">
                              </a>
                         
                      
                            {{-- <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-wishlist"><span>add to wishlist</span></a>
                            </div> --}}

                        </figure><!-- End .product-media -->

                        <div class="product-body">
                            <h3 class="product-title"><a href="{{  route('product.details',$products_t->id)  }}">{{ $products_t->product_name }}</a></h3><!-- End .product-title -->
                            <div class="product-price">
                                <span>&#2547;</span>    {{ number_format($products_t->product_price,2) }}
                            </div><!-- End .product-price -->
                        </div><!-- End .product-body -->
                        <div class="product-action">
                            <button class="btn-product btn-cart cart_btn_click" href="#product_details" data-toggle="modal" ><span>BUY NOW</span></button>
                            <input type="hidden" class="product_input_id"  value="{{ $products_t->id }}">
                        </div><!-- End .product-action -->
                    </div><!-- End .product -->
                    @endforeach
                </div><!-- End .owl-carousel -->
            </div><!-- .End .tab-pane -->
            @endforeach
        </div><!-- End .tab-content -->
    </div><!-- End .container -->

    <div class="mb-5"></div><!-- End .mb-6 -->
    <div class="container">
        <hr>
        <div class="row justify-content-center">
            <div class="col-lg-4 col-sm-6">
                <div class="icon-box icon-box-card text-center">
                    <span class="icon-box-icon">
                        <i class="icon-rocket"></i>
                    </span>
                    <div class="icon-box-content">
                        <h3 class="icon-box-title">Payment & Delivery</h3><!-- End .icon-box-title -->
                        <p>Free shipping for orders over $50</p>
                    </div><!-- End .icon-box-content -->
                </div><!-- End .icon-box -->
            </div><!-- End .col-lg-4 col-sm-6 -->

            <div class="col-lg-4 col-sm-6">
                <div class="icon-box icon-box-card text-center">
                    <span class="icon-box-icon">
                        <i class="icon-rotate-left"></i>
                    </span>
                    <div class="icon-box-content">
                        <h3 class="icon-box-title">Return & Refund</h3><!-- End .icon-box-title -->
                        <p>Free 100% money back guarantee</p>
                    </div><!-- End .icon-box-content -->
                </div><!-- End .icon-box -->
            </div><!-- End .col-lg-4 col-sm-6 -->

            <div class="col-lg-4 col-sm-6">
                <div class="icon-box icon-box-card text-center">
                    <span class="icon-box-icon">
                        <i class="icon-life-ring"></i>
                    </span>
                    <div class="icon-box-content">
                        <h3 class="icon-box-title">Quality Support</h3><!-- End .icon-box-title -->
                        <p>Alway online feedback 24/7</p>
                    </div><!-- End .icon-box-content -->
                </div><!-- End .icon-box -->
            </div><!-- End .col-lg-4 col-sm-6 -->
        </div><!-- End .row -->

        <div class="mb-2"></div><!-- End .mb-2 -->
    </div><!-- End .container -->
    <style>
        .modal-dialog1{
           max-width:1024px !important;
           margin:0 auto !important;
        }
    </style>
    {{-- ============================== Product Details Modal Ajax start ============================================  --}}
      <div class="modal  search-result add_to_cart_modal_close" id="product_details" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="search-result">
                @include('pages.search_result')
            </div>
        </div>
  {{-- ============================== Product Details Modal Ajax END ============================================  --}}
   
</main>
  
@endsection