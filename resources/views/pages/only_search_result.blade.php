@extends('layouts.fontend-master')
@section('product') active  @endsection
@section('product_list')  Search-product-list @endsection

@section('content')
<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="#">All Product</a></li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->
    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="products mb-3">
                        <div class="row justify-content-center">
                            @if($products->count() >=1)
                            @foreach ($products as $product)
                            <div class="col-6 col-md-4 col-lg-4 col-xl-3 product_data">
                                <div class="product product-7 text-center">
                                    <figure class="product-media">
                                        <span class="product-label label-new">New</span>
                                        <a href=" {{ route('product.details',$product->id) }}">
                                            <img src="{{asset($product->product_img_one) }}" alt="{{ $product->product_name }}" class="product-image">
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                            <a href="" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                                            <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                                        </div><!-- End .product-action-vertical -->

                                        <div class="product-action">
                                            <a class="btn-product btn-cart " href="{{ route('product.details',$product->id) }}"  ><span>Buy Now</span></a>
                                            <input type="hidden" class="product_input_id"  value="{{ $product->id }}">
                                        </div><!-- End .product-action -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <h3 class="product-title"><a href="{{  route('product.details',$product->id)  }}">{{ $product->product_name }}</a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            <span>&#2547; </span>&nbsp;    {{ number_format($product->product_price,2) }}
                                        </div><!-- End .product-price -->
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 90%;"></div><!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                            <span class="ratings-text">( 2 Reviews )</span>
                                        </div><!-- End .rating-container -->
                                    </div><!-- End .product-body -->
                                </div><!-- End .product -->
                            </div>
                            @endforeach
                            @else
                            <div class=" pt-4 text-center">
                                <img src="{{asset('frotend') }}/assets/no_product_alert/no-emoji.gif" style="width: 200px" alt="">
                                <h5 class="text-danger ">No Product Found</h5>
                            </div>
                            @endif

                        </div><!-- End .row -->
                        <style>
                            .pagination nav{
                                border: 1px solid #f3d7bb;
                                padding: 5px 8px;
                                border-radius: 2px;
                            }
                          </style>
                            <nav aria-label="Page navigation">
                                <ul class="pagination justify-content-center">
                                    {{ $products->links() }}
                                </ul>
                            </nav>
                    </div><!-- End .products -->
                </div><!-- End .col-lg-9 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .page-content -->

  
</main>
<script src="{{asset('frotend') }}/assets/js/price_range.js"></script>
@endsection