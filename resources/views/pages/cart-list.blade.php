@extends('layouts.fontend-master')
@section('content')

<main class="main" id="cart_realaod_table">
    <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">Shopping Cart<span>Shop</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Shop</a></li>
                <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->
<style>
    .form-control{
        margin-bottom: 0rem !important;
    }
</style>
    <div class="page-content">
        <div class="cart">
            <div class="container">
                <div class="row">
                    <div class="col-sm-7 col-md-8">
                        <table class="table table-cart  ">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <style>
                                .btnhidden1{
                                    display: none;
                                    visibility: hidden;
                                }
                            </style>
                            <tbody>
                             @if($carts->count() >=1)
                               @foreach ( $carts as $carts_item )
                                <tr class="product_data" >
                                    <td class="product-col-n">
                                        <div class="product d-flex align-items-center">
                                            <figure class="product-media ">
                                                <a>
                                                    <img src="{{ asset($carts_item->product->product_img_one) }}" width="60px" height="50px"  alt="{{ $carts_item->product->product_name }}">
                                                </a>
                                            </figure>

                                            <p class="product-title-n ml-2">
                                                <a>{{ $carts_item->product->product_name }}</a>
                                            </p><!-- End .product-title -->
                                        </div><!-- End .product -->
                                    </td>
                                    <td class="price-col-n"> <span>&#2547;</span> {{ number_format($carts_item->price,2) }} </td>
                                    <td class="qty_col-n w-25">
                                        <div class=" d-flex">
                                            <button class="btn-decrement_men btnhidden{{$carts_item->qty}}">-</button>
                                            <input type="number" name="qty" id="qty" class="form-control p-0 text-center" value="{{ $carts_item->qty}}" min="1"step="1"  required>
                                        <button class="btn-increment_men mr-4">+</button>
                                        </div><!-- End .cart-product-quantity -->
                                    </td>
                                    <td class="total-col-n"> <span>&#2547;</span> {{ number_format($carts_item->qty * $carts_item->price,2)}}</td>

                                    <input type="hidden" value="{{ $carts_item->id }}" id="cart_remove_id_valu" >
                                   
                                    <td class="remove-col-n"> <a href=""  id="cart_remove_id"  class="btn-remove" title="Remove Product"><i class="icon-close"></i></a></td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="4"> 
                                        <div class="card text-danger text-center bg-light ">
                                            <div class="card-body pt-2">
                                                <strong> No Product In Cart | <a href="{{ route('all.product') }}"><span>BACK TO SHOPPING</span><i class="icon-refresh"></i></a></strong>
                                            </div>
                                       </div>
                                    </td>
                                </tr>
                               
                                @endif
                            </tbody>
                        </table><!-- End .table table-wishlist -->

                        <div class="cart-bottom">
                            @if(Session::has('copon'))
                            @else  
                            <div class="cart-discount">
                                <form action="{{ url('coupon/apply') }}" method="POST">
                                    @csrf
                                    <div class="input-group">
                                        <input type="text" name="copon_name" class="form-control" required placeholder="coupon code">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-primary-2" type="submit"><i class="icon-long-arrow-right"></i></button>
                                        </div><!-- .End .input-group-append -->
                                    </div><!-- End .input-group -->
                                </form>
                            </div><!-- End .cart-discount -->
                            @endif
                        </div><!-- End .cart-bottom -->
                    </div><!-- End .col-lg-9 -->
                    <div class="col-sm-5 col-md-4">
                        <div class="summary summary-cart">
                            <h3 class="summary-title">Cart Total</h3><!-- End .summary-title -->

                            <table class="table table-summary">
                                <tbody>
                                    <tr class="summary-subtotal">
                                        <td>Subtotal:</td>
                                        <td> <span>&#2547;</span> {{ number_format($sub_total,2) }} </td>
                                    </tr><!-- End .summary-subtotal -->

                                    @if(Session::has('copon'))
                                    <tr class="summary-subtotal">
                                        <td>Coupon Dicount:</td>
                                        <td>{{ session()->get('copon')['coupon_discount'] }} %</td>
                                    </tr><!-- End .summary-subtotal -->
                                    <tr class="summary-subtotal">
                                        <td>Discount Amount:</td>
                                        <td><span>&#2547;</span> {{ number_format($discount_amount = session()->get('copon')['discount_amount'],2)}}</td>
                                    </tr><!-- End .summary-subtotal -->
                                    <tr class="summary-subtotal">
                                        <td>Coupon name</td>
                                        <td>{{ session()->get('copon')['coupon_name'] }} <a href="{{ route('couponr') }}"> <button class="btn-increment_men_remove">X</button> </a></td>
                                    </tr><!-- End .summary-subtotal -->

                                    <tr class="summary-shipping">
                                        <td>Shipping:</td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr class="summary-shipping-row">
                                        <td>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="free-shipping" name="shipping" class="custom-control-input">
                                                <label class="custom-control-label" for="free-shipping">Free Shipping</label>
                                            </div><!-- End .custom-control -->
                                        </td>
                                        <td>$0.00</td>
                                    </tr><!-- End .summary-shipping-row -->

                                    <tr class="summary-total">
                                        <td>Total:</td>
                                        <td> <span>&#2547;</span> {{ number_format($sub_total-$discount_amount,2) }}</td>
                                    </tr><!-- End .summary-total -->
                                    @else
                                    <tr class="summary-total">
                                        <td>Total:</td>
                                        <td> <span>&#2547;</span> {{ number_format($sub_total,2) }}.</td>
                                    </tr><!-- End .summary-total -->
                                    @endif
                                   
                                 
                                    
                                </tbody>
                            </table><!-- End .table table-summary -->

                            <a href="{{ url('check/out') }}" class="btn btn-outline-primary-2 btn-order btn-block">PROCEED TO CHECKOUT</a>
                        </div><!-- End .summary -->

                        <a href="{{ route('all.product') }}" class="btn btn-outline-dark-2 btn-block mb-3"><span>CONTINUE SHOPPING</span><i class="icon-refresh"></i></a>
                    </div><!-- End .col-lg-3 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .cart -->
    </div><!-- End .page-content -->
</main><!-- End .main -->

@endsection