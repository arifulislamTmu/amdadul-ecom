@extends('layouts.fontend-master')
@section('content')
@section('product_list')   checkout-page  @endsection

<main class="main">
    <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">Checkout<span>Shop</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Shop</a></li>
                <li class="breadcrumb-item active" aria-current="page">Checkout</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content" id="cart_realaod_table">
        <div class="checkout">
            <div class="container">
                <form action="{{ route('procces.order.buy') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-9">
                            <h2 class="checkout-title">Order Shipping  Details</h2><!-- End .checkout-title -->
                                <div class="row">
                                    <div class="col-sm-6">
                                        <input type="hidden" name="auth_id_defulte" value="0">
                                        <label>Full Name *</label>
                                        <input type="text" class="form-control" name="frist_name"  required>
                                    </div><!-- End .col-sm-6 -->
                                    <div class="col-sm-6 ">
                                        <label>Phone *</label>
                                        <input type="text" class="form-control text-left" name="phone"  required>
                                    </div><!-- End .col-sm-6 -->

                                    <div class="col-sm-6 d-none">
                                        <label>Last Name *</label>
                                        <input type="text" class="form-control" name="last_name"  value="No value" required>
                                    </div><!-- End .col-sm-6 -->
                                </div><!-- End .row -->
                                <div class="row">
                                    <div class="col-sm-6 d-none">
                                        <label>Email address *</label>
                                        <input type="text" class="form-control" name="email" value="No value" required>
                                    </div><!-- End .col-sm-6 -->
                                </div><!-- End .row -->

                                <div class="row">
                                    <div class="col-sm-6 d-none">
                                        <label>Country *</label>
                                        <input type="text" class="form-control" name="country" value="No value"  required>
                                    </div><!-- End .col-sm-6 -->
                                    <div class="col-sm-6 d-none">
                                        <label>Division *</label>
                                        <input type="text" class="form-control" name="division"  value="No value" required>
                                    </div><!-- End .col-sm-6 -->
                                </div><!-- End .row -->
                              
                               
                                <div class="row">
                                    <div class="col-sm-6 d-none">
                                        <label>District *</label>
                                        <input type="text" class="form-control" name="district"  value="No value" required>
                                    </div><!-- End .col-sm-6 -->

                                    <div class="col-sm-6 d-none">
                                        <label>Thana *</label>
                                        <input type="text" class="form-control" name="thana"   value="No value" required>
                                    </div><!-- End .col-sm-6 -->
                                </div><!-- End .row -->
                                <label>Address/Holdding no * </label>
                                <textarea class="form-control" cols="30" name="address_holdding" rows="4"> </textarea>
                      </div><!-- End .col-lg-9 -->
                        <aside class="col-lg-3">
                            <div class="summary">
                                <h3 class="summary-title">Your Order</h3><!-- End .summary-title -->

                                <table class="table table-summary">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($cart_join_prod as $cart_product )
                                        <tr>
                                            <td><a >{{ $cart_product->product_name }} * {{ $cart_product->qty }}</a></td>
                                            <td>    <span>&#2547; </span>&nbsp; {{ number_format($cart_product->product_price * $cart_product->qty,2) }}</td>
                                        </tr>
                                        @endforeach

                                        @if(Session::has('copon'))
                                       
                                        <tr class="summary-total">
                                            <td>Sub Total:</td>
                                            <td>     <span>&#2547; </span>&nbsp;  {{ number_format($sub_total,2) }}</td>
                                        </tr><!-- End .summary-total -->
                                        <tr class="summary-total">
                                            <td>Discount:</td>
                                            <td><span>&#2547;</span> {{ number_format($discount_amount = session()->get('copon')['discount_amount'],2)}}</td>
                                        </tr><!-- End .summary-total -->
                                        <tr class="summary-total">
                                            <td>Total:</td>
                                            <td> <span>&#2547;</span> {{ number_format( $sub_total-$discount_amount,2)}}</td>
                                        </tr><!-- End .summary-total -->

                                        <input type="hidden" name="subtotal" value="{{ $sub_total }}">
                                        <input type="hidden" name="discount" value="{{ $discount_amount }}">
                                        <input type="hidden" name="total" value="{{ $sub_total-$discount_amount }}">
                                        @else
                                        <input type="hidden" name="subtotal" value="{{ $sub_total }}">
                                        <input type="hidden" name="total" value="{{ $sub_total }}">
                                        <tr class="summary-total">
                                            <td> Sub Total:</td>
                                            <td>     <span>&#2547; </span>&nbsp; {{ number_format($sub_total,2) }}</td>
                                        </tr><!-- End .summary-total -->
                                        <tr class="summary-total">
                                            <td>Total:</td>
                                            <td>    <span>&#2547; </span>&nbsp;  {{ number_format($sub_total,2) }}</td>
                                        </tr><!-- End .summary-total -->
                                        @endif
                                    </tbody>
                                </table><!-- End .table table-summary -->

                                <div class="accordion-summary" id="accordion-payment">
                                    <div class="mt-2 p-2 border">
                                        <h6 class="p-2 m-0"> 01303655252 - Call </h6>
                                        <h6 class="p-2 m-0"> 01303655252 BKash or Nagod (Personal) </h6>
                                    </div>
                                    <div class="card my-2">
                                        <div class="card-header" id="heading-3">
                                            <h2 class="card-title p-1">
                                                <input type="radio" name="payment_inside" value="60" checked> Delivery charge within Dhaka   <span>&#2547; </span>60
                                            </h2>
                                        </div>
                                    </div>
                                    <div class="card my-2">
                                        <div class="card-header" id="heading-3">
                                             <h2 class="card-title p-1 text-danger">
                                                <input type="radio" name="payment_inside" value="130" >  Delivery charge outside Dhaka  <span>&#2547; </span>130 (Advance)
                                            </h2>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="heading-3">
                                            <h2 class="card-title p-1">
                                                <input type="radio" checked name="payment_type" value="Cash on delivery" required>  Cash on delivery
                                            </h2>
                                        </div>
                                    </div>

                                </div><!-- End .accordion -->

                                   @if($sub_total > 1)
                                    <button type="submit" class="btn btn-outline-primary-2 btn-order btn-block">
                                        <span class="btn-text">Place Order</span>
                                        <span class="btn-hover-text ">Proceed to Checkout</span>
                                    </button>
                                  @else
                                      <a href="{{ url('all-product/') }}" class="btn btn-outline-primary-2 btn-block"> Back to Shopping</a>
                              @endif
                            </div><!-- End .summary -->
                        </aside><!-- End .col-lg-3 -->
                    </div><!-- End .row -->
                </form>
            </div><!-- End .container -->
        </div><!-- End .checkout -->
    </div><!-- End .page-content -->
</main><!-- End .main -->

@endsection