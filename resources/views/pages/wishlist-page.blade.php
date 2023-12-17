@extends('layouts.fontend-master')
@section('content')
@section('product_list') wish-list-page @endsection
<main class="main">
    <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">Wishlist<span>Shop</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Shop</a></li>
                <li class="breadcrumb-item active" aria-current="page">Wishlist</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="container">
            <table class="table table-wishlist table-mobile">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($wishlists_pro as $wishlists_p )
                        
                    <tr>
                        <td class="product-col">
                            <div class="product">
                                <figure class="product-media">
                                    <a href="#">
                                        <img src="{{ asset($wishlists_p->product->product_img_one) }}" alt="{{ $wishlists_p->product->product_name }}">
                                    </a>
                                </figure>

                                <h3 class="product-title">
                                    <a>{{ $wishlists_p->product->product_name }}</a>
                                </h3><!-- End .product-title -->
                            </div><!-- End .product -->
                        </td>
                        <td class="price-col"> <span>&#2547;</span> {{ number_format($wishlists_p->product->product_price,2) }} </td>
                        <td class="action-col">
                            <a href="{{ route('product.details',$wishlists_p->product->id) }}" class="btn btn-block btn-outline-primary-2"><i class="icon-cart-plus"></i>BUY NOW</a>
                        </td>
                        <td class="remove-col"><a href="{{ url('wishlist/remove/'.$wishlists_p->id) }}" class="btn-remove"><i class="icon-close"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table><!-- End .table table-wishlist -->
        </div><!-- End .container -->
    </div><!-- End .page-content -->
</main><!-- End .main -->

  
@endsection