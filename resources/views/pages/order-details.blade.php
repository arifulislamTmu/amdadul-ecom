
@extends('layouts.fontend-master')
@section('content')
<main class="main">
    <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">My Order Details <span>Shop</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{url('my-profile/') }}">My-Profile</a></li>
                <li class="breadcrumb-item active" aria-current="page">My Order </li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="dashboard">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                      <div class="card border">
                        <div class="card-header  text-center mt-2">
                          <h5>Order Products List</h5>
                        </div>
                        @php
                          $count = 1;
                        @endphp
                        <div class="card-body">
                          <table class="table table-hover table-bordered text-center">
                            <thead>
                              <tr>
                                <th scope="col">Item No</th>
                                <th scope="col">Product name</th>
                                <th scope="col">Product Image</th>
                                <th scope="col">Color</th>
                                <th scope="col">Size</th>
                                <th scope="col">Price</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach ( $order_items as  $order_item)
                              <tr>
                                <th scope="row">{{ $count++ }}</th>
                                <td>{{ $order_item->product->product_name }}</td>
                                <td> <img src="{{ asset($order_item->product->product_img_one) }}" style="width: 50px;" alt=""></td>
                                <td>{{ $order_item->product_color}}</td>
                                <td>{{ $order_item->product_size}}</td>
                                <td>    <span>&#2547; </span>&nbsp;  {{ $order_item->product->product_price}}</td>
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                        </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="card border">
                        <div class="card-header  text-center">
                          <h5>Shipping Address</h5>
                        </div>
                        @php
                          $count = 1;
                        @endphp
                        <div class="card-body">
                          <table class="table table-hover table-bordered ">
                            <thead>
                              <tr>
                                <th colspan="2" class="text-center"> Address Details</th>
                              </tr>
                            </thead>
                            <tbody >
                              @foreach ( $shippings as  $shipping)
                              <tr>
                                <td class="pl-2 w-50"> Name</td>
                                <td class="pl-2 w-50">{{ $shipping->frist_name}}</td>
                              </tr>
                              <tr>
                                <td class="pl-2 w-50">Phone</td>
                                <td class="pl-2 w-50">{{ $shipping->phone }}</td>
                              </tr>
                              <tr>
                                <td class="pl-2 w-50">Email</td>
                                <td class="pl-2 w-50">{{ $shipping->email }}</td>
                              </tr>
                              <tr>
                                <td class="pl-2 w-50">Address</td>
                                <td class="pl-2 w-50">{{ $shipping->address_holdding }}, {{ $shipping->thana }}, {{ $shipping->district }},  {{ $shipping->division }}</td>
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                        </div>
                        </div>
                   
                    </div>
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .dashboard -->
    </div><!-- End .page-content -->
</main><!-- End .main -->


@endsection