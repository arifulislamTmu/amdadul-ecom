@extends('layouts.fontend-master')
@section('product_list')  Order success @endsection

@section('content')

<main class="main">
    <div class="page-header text-center" style="background-image: url('{{asset('frotend') }}/assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title text-success">Thank you. <br> <h3 class="fs-2">Your order has been received.</h3>  </h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
  
    <div class="page-content pb-3">
        <div class="container">
            <div class="row border">
                <div class="col-sm-7">
                   <div class="order_details  ">
                     <h3 class=" text-center">Order details</h3>
                     <hr class="p-1 m-1">
                      <table class="table table-borderd border">
                        <tr>
                            <th  class="px-3">Sl</th>
                            <th>Product Name</th>
                            <th>Image</th>
                            <th>Color</th>
                            <th>Qty</th>
                            <th>Size</th>
                            <th class="text-right pr-2">Price</th>
                        </tr>
                            @php
                                $count = 1;
                            @endphp
                        @foreach ($join_table as $order_value )
                        <tr>
                            <td  class="px-3" >{{ $count ++ }}</td>
                            <td>{{ $order_value->product_name }}</td>
                            <td>  <img src="{{ asset($order_value->product_img_one) }}" width="60px" height="50px"> </td>
                            <td>{{ $order_value->product_color }}</td>
                            <td>{{ $order_value->product_qty }}</td>
                            <td> {{ $order_value->product_size }}</td>
                            <td class="text-right pr-4"> &#2547;  {{ $order_value->product_price }} </td>
                        </tr>
                        @endforeach
                        <tr>
                            <th colspan="6" class="text-right pr-4"> <strong>Sub Total</strong></th>
                            <th class="text-right pr-2"><strong> &#2547;  {{ $order_value->subtotal }} </strong></th>
                        </tr> 
                        <tr>
                            <th colspan="6" class="text-right pr-4"> <strong>Service Charge</strong></th>
                            <th class="text-right pr-2"><strong>&#2547;  {{ $order_value->payment_inside }} </strong></th>
                        </tr> 
                        <tr>
                            <th colspan="6" class="text-right pr-4"> <strong>Total</strong></th>
                            <th class="text-right pr-2"><strong> &#2547;  {{$order_value->payment_inside + $order_value->total }} </strong></th>
                        </tr> 
                       
                        <strong>Invoice :#{{ $order_value->invoice }}</strong>
                      </table>
                    
                   </div>
                 
                </div><!-- End .col-lg-10 offset-1 -->
                <div class="col-sm-5">
                    <div class="order_details text-center">
                      <h3 class="">Shipping Details</h3>
                    </div>
                    <hr class="p-1 m-1">
                     <h6 class="text-success">Order Status : [ @if( $order_value->order_status==1) Order Pendding @elseif($order_value->order_status==2) Order Recived @elseif($order_value->order_status==3) Ready for delivery @elseif($order_value->order_status==4) Delivery success @else @endif ]</h6>
                    <div class="card border-0">
                        <div class="card-body  ">
                            @foreach ($join_table as $order_value2 )
        
                            @endforeach
                            <table class="table table-border border-0">
                                <tr>
                                    <th>Full name:</th>
                                    <th>{{ $order_value2->frist_name }}</th>
                                </tr>
                                <tr>
                                    <th>Phone No:</th>
                                    <th>{{ $order_value2->phone }}</th>
                                </tr>
                                <tr>
                                    <th>Address: </th>
                                    <th>{{  $order_value2->address_holdding  }}</th>
                                </tr>
                            </table>
                        </div>
                    </div>
                 </div><!-- End .col-lg-10 offset-1 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .page-content -->
</main><!-- End .main -->

  
@endsection