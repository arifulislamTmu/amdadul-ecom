@extends('layouts.fontend-master')
@section('product_list')   @foreach ($product_details as $product ){{  $product->product_slug }} @endforeach  @endsection
@section('content')
<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
        <div class="container d-flex align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Products Details</a></li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->
    <style>

        .details-action-wrapper .btn-product{
            padding: 7px 64px;
        }
    </style>
    @foreach ($product_details as $product )
    <div class="page-content">
        <div class="container">
            <div class="product-details-top product_data">
                <div class="row">
                    <div class="col-md-6">
                        <div class="product-gallery product-gallery-vertical">
                            <div class="row">
                                <figure class="product-main-image">
                                    <img id="product-zoom" src="{{asset( $product->product_img_one) }}" data-zoom-image="{{asset( $product->product_img_one) }}" alt="{{ $product->product_name }}">

                                    <a href="#" id="btn-product-gallery" class="btn-product-gallery">
                                        <i class="icon-arrows"></i>
                                    </a>
                                </figure><!-- End .product-main-image -->

                                <div id="product-zoom-gallery" class="product-image-gallery">
                                  
                                    <a class="product-gallery-item" href="#" data-image="{{asset( $product->product_img_two) }}" data-zoom-image="{{asset( $product->product_img_two) }}">
                                        <img src="{{asset( $product->product_img_two) }}" alt="">
                                    </a>

                                    <a class="product-gallery-item" href="#" data-image="{{asset( $product->product_img_three) }}" data-zoom-image="{{asset( $product->product_img_three) }}">
                                        <img src="{{asset( $product->product_img_three) }}" alt="">
                                    </a>
                                    <a class="product-gallery-item" href="#" data-image="{{asset( $product->product_img_four) }}" data-zoom-image="{{asset( $product->product_img_four) }}">
                                        <img src="{{asset( $product->product_img_four) }}" alt="">
                                    </a>
                                    <a class="product-gallery-item" href="#" data-image="{{asset( $product->product_img_five) }}" data-zoom-image="{{asset( $product->product_img_five) }}">
                                        <img src="{{asset( $product->product_img_five) }}" alt="">
                                    </a>
                                    <a class="product-gallery-item " href="#" data-image="{{asset( $product->product_img_six) }}" data-zoom-image="{{asset( $product->product_img_six) }}">
                                        <img src="{{asset( $product->product_img_six) }}" alt="">
                                    </a>
                                </div><!-- End .product-image-gallery -->
                            </div><!-- End .row -->
                        </div><!-- End .product-gallery -->
                    </div><!-- End .col-md-6 -->

                    <div class="col-md-6">
                        <form action="{{ route('buynow.product') }}" method="post">
                            @csrf
                        <div class="product-details">
                            <h1 class="product-title">{{ $product->product_name }}</h1><!-- End .product-title -->
                            <input type="hidden" name="product_price" id="product_price" value="{{ $product->product_price }}">
                            <input type="hidden" name="product_id" id="product_id" value="{{ $product->id }}">
                            <div class="ratings-container">
                                <div class="ratings">
                                    <div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->
                                </div><!-- End .ratings -->
                                <a class="ratings-text" href="#product-review-link" id="review-link">( 200 Reviews )</a>
                            </div><!-- End .rating-container -->

                            <div class="product-price">
                                <span>&#2547;</span>&nbsp;{{ number_format($product->product_price,2) }}
                            </div><!-- End .product-price -->

                            <div class="product-content">
                                
                                <p>{!!$product->sort_description !!}</p>
                            </div><!-- End .product-content -->

                            <div class="details-filter-row details-row-size">
                                <label>Color:</label>
                               @php
                                  $colors = json_decode($product->product_color);
                                  $sizes = json_decode($product->product_size);
                               @endphp
                                <div class="product-nav product-nav-thumbs">
                                    <select name="product_color" id="product_color" required class="form-control">
                                        <option value="" selected="selected">Select a Color</option>
                                     @foreach ($colors as $color )
                                       <option value="{{ $color}}"> {{ $color}}</option>
                                     @endforeach
                                    </select>
                                </div>
                                <div class="error_msg text-danger ml-5"> </div>
                            </div><!-- End .details-filter-row -->

                            <div class="details-filter-row details-row-size">
                                <label for="size">Size:</label>
                                <div class="select-custom">
                                    <select name="product_size" id="product_size" required class="form-control" required>
                                        <option value="" selected="selected">Select a size</option>
                                        @foreach ($sizes as $size )
                                        <option value="{{ $size}}"> {{ $size}}</option>
                                      @endforeach
                                    </select>
                                </div>
                                <div class="error_msg2 text-danger "> </div>
                            </div><!-- End .details-filter-row -->

                            <div class="details-filter-row details-row-size">
                                <label for="qty">Qty:</label>
                                <div class="product-details-quantity">
                                    <input type="number" name="qty" id="qty" class="form-control" value="1" min="1" max="10"
                                        step="1" data-decimals="0" required>
                                </div>
                                <div class="error_msg3 text-danger ml-5"> </div>
                            </div><!-- End .details-filter-row -->

                            <div class="product-details-action">
                                <button class="btn-product btn-cart add_to_cart" ><span>Add To Cart</span></button>
                                <input type="hidden" id="product_id"  value="{{ $product->id }}">
                                {{-- <a href="#" class="btn-product btn-cart"><span>BUY NOW</span></a> --}}

                                <div class="details-action-wrapper">
                                    <input type="hidden" class="product_input_id"  value="{{ $product->id }}">
                                    <div class="details-action-wrapper">
                                        <button href="" class="btn btn-success btn-product btn-cart text-white " title="Buynow"><span> Buy Now</span></button>
                                    </div><!-- End .details-action-wrapper -->
                              
                                </div><!-- End .details-action-wrapper -->
                            </div><!-- End .product-details-action -->
                        </div><!-- End .product-details -->
                        </form>
                    </div><!-- End .col-md-6 -->
                </div><!-- End .row -->
            </div><!-- End .product-details-top -->

            <style>
                .custom_css_tab{
                    height:500px;
                    overflow: auto;
                }
            </style>
            <div class="product-details-tab">
                <ul class="nav nav-pills justify-content-center" role="tablist">
                     <li class="nav-item">
                        <a class="nav-link active" id="product-info-link" data-toggle="tab" href="#product-info-tab" role="tab" aria-controls="product-info-tab" aria-selected="false">Long Description</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " id="product-desc-link" data-toggle="tab" href="#product-desc-tab" role="tab" aria-controls="product-desc-tab" aria-selected="true">Sort Description</a>
                    </li>
                   
                    <li class="nav-item">
                        <a class="nav-link" id="product-shipping-link" data-toggle="tab" href="#product-shipping-tab" role="tab" aria-controls="product-shipping-tab" aria-selected="false">Shipping & Returns</a>
                    </li>
                </ul>
                <div class="tab-content custom_css_tab">
                    
                    <div class="tab-pane fade show active" id="product-info-tab" role="tabpanel" aria-labelledby="product-info-link">
                        <div class="product-desc-content">
                            <h3>Long Description</h3>
                              <p> {!!$product->long_description  !!} </p>
                            <!--<p>{{strip_tags($product->long_description) }} </p>-->
                            <h3>Size</h3>
                            @foreach ($sizes as $size )
                            <li> {{ $size}}</li>
                          @endforeach
                        </div><!-- End .product-desc-content -->
                    </div><!-- .End .tab-pane -->
                    <div class="tab-pane fade " id="product-desc-tab" role="tabpanel" aria-labelledby="product-desc-link">
                        <div class="product-desc-content">
                            <h3>Product Information</h3>
                            <p> {!!$product->sort_description  !!} </p>
                            <!--<p>{{ strip_tags($product->sort_description) }} </p>-->
                            <h3>Size</h3>
                            @foreach ($sizes as $size )
                            <li> {{ $size}}</li>
                          @endforeach
                        </div><!-- End .product-desc-content -->
                    </div><!-- .End .tab-pane -->
                    
                    <div class="tab-pane fade" id="product-shipping-tab" role="tabpanel" aria-labelledby="product-shipping-link">
                        <div class="product-desc-content">
                            <h3>Delivery & returns</h3>
                            <p>We deliver to over 100 countries around the world. For full details of the delivery options we offer, please view our <a href="#">Delivery information</a><br>
                            We hope you’ll love every purchase, but if you ever need to return an item you can do so within a month of receipt. For full details of how to make a return, please view our <a href="#">Returns information</a></p>
                        </div><!-- End .product-desc-content -->
                    </div><!-- .End .tab-pane -->
                </div><!-- End .tab-content -->
            </div><!-- End .product-details-tab -->
            @endforeach

     
            <h2 class="title text-center mb-4">You May Also Like</h2><!-- End .title text-center -->

            <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                data-owl-options='{
                    "nav": false, 
                    "dots": true,
                    "margin": 20,
                    "loop": false,
                    "responsive": {
                        "0": {
                            "items":1
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
                @foreach ($cat_product as $cat_prouct )
    
                <div class="product product-7 text-center">
                    <figure class="product-media">
                        <span class="product-label label-new">New</span>
                        <a href="{{  route('product.details',$cat_prouct->id) }}">
                            <img src="{{ asset($cat_prouct->product_img_one)}}" alt="{{ $cat_prouct->product_name }}" class="product-image">
                        </a>
                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                            <a href="" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                            <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                        </div><!-- End .product-action-vertical -->

                        <div class="product-action">
                            
                            <a href="{{  route('product.details',$cat_prouct->id) }}" class="btn-product btn-cart"><span>BUY NOW</span></a>
                        </div><!-- End .product-action -->
                    </figure><!-- End .product-media -->
                    <div class="product-body">
                        <h3 class="product-title"><a href="{{  route('product.details',$cat_prouct->id) }}">{{ $cat_prouct->product_name }}</a></h3><!-- End .product-title -->
                        <div class="product-price">
                            <span>&#2547;</span>  {{ number_format($product->product_price,2) }}
                        </div><!-- End .product-price -->
                        <div class="ratings-container">
                            <div class="ratings">
                                <div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->
                            </div><!-- End .ratings -->
                            <span class="ratings-text">( 2 Reviews )</span>
                        </div><!-- End .rating-container -->
                    </div><!-- End .product-body -->
                </div><!-- End .product -->
                @endforeach

            </div><!-- End .owl-carousel -->
          
        </div><!-- End .container -->
    </div><!-- End .page-content -->
  
</main><!-- End .main -->

@endsection