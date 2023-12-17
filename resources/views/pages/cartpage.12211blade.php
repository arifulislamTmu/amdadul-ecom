@extends('layouts.fontend-master')

@section('content')

        <!-- Hero Section Begin -->
        <section class="hero hero-normal">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="hero__categories">
                            <div class="hero__categories__all">
                                <i class="fa fa-bars"></i>
                                <span>All departments</span>
                            </div>
                             @php
                                $categories = App\Category::latest()->get();
                            @endphp
                            <ul>
                                @foreach ($categories as $cat)
                                    <li><a href="{{  $cat->id }}">{{  $cat->category_name }}</a></li> 
                                @endforeach
                            </ul>
                           
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="hero__search">
                            <div class="hero__search__form">
                                <form action="#">
                                    <div class="hero__search__categories">
                                        All Categories
                                        <span class="arrow_carrot-down"></span>
                                    </div>
                                    <input type="text" placeholder="What do yo u need?">
                                    <button type="submit" class="site-btn">SEARCH</button>
                                </form>
                            </div>
                            <div class="hero__search__phone">
                                <div class="hero__search__phone__icon">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <div class="hero__search__phone__text">
                                    <h5>+65 11.188.888</h5>
                                    <span>support 24/7 time</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Hero Section End -->
    
        <!-- Breadcrumb Section Begin -->
        <section class="breadcrumb-section set-bg" data-setbg="{{ asset('frotend') }}/img/breadcrumb.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="breadcrumb__text">
                            <h2>Shopping Cart</h2>
                            <div class="breadcrumb__option">
                                <a href="./index.html">Home</a>
                                <span>Shopping Cart</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Breadcrumb Section End -->
    
        <!-- Shoping Cart Section Begin -->
        <section class="shoping-cart spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="shoping__cart__table">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="shoping__product">Products</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ( $carts as $cart)
                                    <tr>
                                        <td class="shoping__cart__item">
                                            <img src="{{ asset($cart->product->product_img_one ) }}" style="width:50px" alt="">
                                            <h5>{{$cart->product->product_name }}</h5>
                                        </td>
                                        <td class="shoping__cart__price">
                                            <span>&#2547; </span>&nbsp; {{$cart->product->product_price }}
                                        </td>
                                        <td class="shoping__cart__quantity">
                                            <div class="quantity">
                                                <div class="pro-qty">
                                                    <input type="text" value="{{ $cart->qty }}" max="1">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="shoping__cart__total">
                                            ${{$cart->price*$cart->qty}}
                                        </td>
                                        <td class="shoping__cart__item__close">
                                           <a href="{{ url('cart/remove',$cart->id) }}"> <span class="icon_close"></span></a>
                                        </td>
                                    </tr>
                                    @endforeach
                              
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        @if(Session::has('copon'))
                        @else  
                        <div class="shoping__continue">
                            <div class="shoping__discount">
                                <h5>Discount Codes</h5>
                                <form action="{{ url('coupon/apply') }}" method="POST">
                                    @csrf
                                    <input type="text" name="copon_name" placeholder="Enter your coupon code">
                                    <button type="submit" class="site-btn">APPLY COUPON</button>
                                </form>
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="col-lg-6">
                        <div class="shoping__checkout">
                            <h5>Cart Total</h5>
                            <ul>
                                @if(Session::has('copon'))
                                <li>Subtotal <span>${{ $sub_total }}</span></li>
                                <li>Coupon name <span>{{ session()->get('copon')['coupon_name'] }} <a href="{{ route('couponr') }}">x</a></span> </li>
                                <li>Discount <span> {{ session()->get('copon')['coupon_discount'] }}%({{ $discount_amount = session()->get('copon')['discount_amount']}})</span></li>
                                <li>Total <span> {{  $sub_total-$discount_amount }}</span></li>
                                @else
                                <li>Total <span>{{  $sub_total }}</span></li>
                                @endif
                            </ul>
                            <a href="{{ url('check/out') }}" class="primary-btn">PROCEED TO CHECKOUT</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Shoping Cart Section End -->


@endsection