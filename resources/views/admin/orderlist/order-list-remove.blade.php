@extends('admin.admin_layouts')
@section('order') active show-sub @endsection
@section('order-sub') active @endsection
@section('admin_content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel" >
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ url('/admin/home') }}">Home</a>
            <span class="breadcrumb-item active"> Remove Order Page</span>
          </nav>
        <div class="sl-pagebody">
            <div class="row">
                <div class="col-12">
                    <div class="card pd-20 pd-sm-40">
                        <h6 class="card-body-title"> Remove Order list</h6>
                        <div class="table-wrapper">
                          <table id="datatable1" class="table display responsive nowrap">
                            <thead>
                              <tr>
                                <th class="wd-10p">Sl.</th>
                                <th class="wd-15p">Invoice no.</th>
                                <th class="wd-20p">Payement type</th>
                                <th class="wd-20p">Sub-total</th>
                                <th class="wd-20p">Discount</th>
                                <th class="wd-20p">Total</th>
                                <th class="wd-20p">Order Status</th>
                                <th class="wd-20p">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                                $count = 1;
                                ?>
                              @foreach ($order_list_remove AS $order)
                              <tr>
                                <td>{{ $count++ }}</td>
                                <td>#{{ $order->invoice }}</td>
                                <td>{{ $order->payemnt_type }}</td>
                                <td>{{ $order->subtotal }}</td>
                                <td>{{ $order->copon_discount }}</td>
                                <td>{{ $order->total }}</td>
                                <td>
                                  @if($order->order_status=="1")
                                  <a href="{{ url('order/status',$order->id) }}" class="btn btn-warning btn-sm" >Accept Order</a>
                                  @elseif($order->order_status=="2")
                                  <a href="{{ url('order/raedy',$order->id) }}" class="btn btn-primary btn-sm" >Ready To delivery</a>
                                 @elseif($order->order_status=="3")
                                   <a href="{{ url('order/raedy/success',$order->id) }}" class="btn btn-outline-success btn-sm" >Delivery Success</a>
                                 @elseif($order->order_status=="5")
                                  <a href="" class="btn btn-danger btn-sm" > Customer Order cancel</a>
                                 @else
                                    <a href="" class="btn btn-success btn-sm" > Success</a>
                                   @endif
                                </td>
                                <td style="width:10%;">
                                  <a href="{{ url('oreder/details',$order->id) }}" class="btn btn-outline-primary btn-sm">Order Detail</a>
                                  <a href="{{ url('generate-pdf',$order->id) }}" class="btn btn-outline-success btn-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer mt-1" viewBox="0 0 16 16">
                                      <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
                                      <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z"/>
                                    </svg>
                                     Invoice</a>
                                  <a href="{{ url('/order-hidden',$order->id) }}" class="btn btn-outline-danger btn-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash " viewBox="0 0 16 16">
                                      <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                      <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                    </svg>
                                  </a>
                                </td>
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                        </div>
                      </div>
                </div>
        
            </div>
        </div><!-- sl-pagebody -->
      </div><!-- sl-mainpanel -->

@endsection

