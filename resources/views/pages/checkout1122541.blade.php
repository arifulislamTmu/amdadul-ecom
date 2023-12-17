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
                        <h2>Checkout</h2>
                        <div class="breadcrumb__option">
                            <a href="">Home</a>
                            <span>Checkout</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <h4>Shipping Details</h4>
                <form action="{{ route('procces.order') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Fist Name<span>*</span></p>
                                        <input type="text" name="shippin_first_name" required value="{{ Auth::user()->name }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Last Name<span>*</span></p>
                                        <input type="text" name="shippin_last_name" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Phone<span>*</span></p>
                                        <input type="number" name="shippin_phone" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="text" name="shippin_email" required value="{{ Auth::user()->email }}">
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Country<span>*</span></p>
                                <input type="text">
                            </div>
                            <div class="checkout__input">
                                <p>Address<span>*</span></p>
                                <input type="text" placeholder="Street Address" required name="shippin_address" class="checkout__input__add">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                @if(Session::has('copon'))
                                <div class="checkout__order__subtotal">Subtotal <span> <span>&#2547;</span> {{ $sub_total }}</span></div>
                                <div class="checkout__order__total">Coupon Discount <span> <span>&#2547;</span> {{ $discount_amount = session()->get('copon')['discount_amount']}} </span></div>
                                <div class="checkout__order__total">Total <span><span>&#2547;</span> {{  $sub_total-$discount_amount }}</span></div>
                                <input type="text" name="subtotal" value="{{ $sub_total }}">
                                <input type="text" name="discount" value="{{ $discount_amount }}">
                                <input type="text" name="total" value="{{ $sub_total-$discount_amount }}">
                                @else
                                <div class="checkout__order__subtotal">Subtotal <span><span>&#2547;</span> {{ $sub_total }}</span></div>
                                <div class="checkout__order__total">Total <span><span>&#2547;</span> {{ $sub_total }}</span></div>
                                <input type="text" name="subtotal" value="{{ $sub_total }}">
                                <input type="text" name="total" value="{{ $sub_total }}">
                                @endif
                                <div class="checkout__input__checkbox">
                                    <label for="payment">
                                      Cash On Delivery 
                                      <input type="checkbox" id="payment" name="payment_type" value="handCash">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <button type="submit" class="site-btn">PLACE ORDER</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->
    

@endsection