@extends('layouts.fontend-master')
@section('content')
@section('product_list')  my-profile-{{ Auth::user()->name}}  @endsection

<main class="main" >
    <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">My Account<span> [{{ Auth::user()->name}}]</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Shop</a></li>
                <li class="breadcrumb-item active" aria-current="page">My Account</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->
   
    <div class="page-content" >
        <div class="dashboard">
            <div class="container">
                <div class="row">
                    <aside class="col-sm-2 col-lg-2">
                        <ul class="nav nav-dashboard flex-column mb-3 mb-md-0" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="tab-dashboard-link" data-toggle="tab" href="#tab-dashboard" role="tab" aria-controls="tab-dashboard" aria-selected="true">My Orders</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab-downloads-link" data-toggle="tab" href="#tab-downloads" role="tab" aria-controls="tab-downloads" aria-selected="false">Change Password</a>
                            </li>
                           
                            <li class="nav-item">
                                <a class="nav-link" id="tab-account-link" data-toggle="tab" href="#tab-account" role="tab" aria-controls="tab-account" aria-selected="false">Account Details</a>
                            </li>
                            <li class="nav-item">
                          
                                <a class="nav-link" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                                 {{ __('Logout') }}
                             </a>
                             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            </li>
                        </ul>
                    </aside><!-- End .col-lg-3 -->
                    <style>
                        .badge{
                            font-size: 12px !important;
                        }
                    </style>
                   
                    <div class="col-sm-10 col-lg-10">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tab-dashboard" role="tabpanel" aria-labelledby="tab-dashboard-link">
                                <table class="table table-bordered" id="myorder">
                                    <thead class="thead-dark text-center">
                                      <tr>
                                        <th style="width:5%;">Sl.No</th>
                                        <th style="width:15%;">#Invoice No</th>
                                        <th scope="col"> Sub Total</th>
                                        <th scope="col"> Dicount Amount</th>
                                        <th scope="col">Total Amount</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Order Status</th>
                                        <th scope="col">Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $count = 1;
                                        @endphp
                                        @foreach ($orders as $order)
                                        <tr>
                                            <th style="padding-left: 10px;"  > {{  $count++ }}</th>
                                            <th style="padding-left: 10px;"  ># {{ $order->invoice }}</th>
                                            <td style="padding-left: 10px;"> <span>&#2547;</span>{{ number_format($order->subtotal) }}</td>
                                            <td style="padding-left: 10px;" > <span>&#2547;</span> {{ number_format($order->copon_discount) }}</td>
                                            <td style="padding-left: 10px;"> <span>&#2547;</span> {{ number_format($order->total) }}</td>
                                            <td style="padding-left: 10px;">
                                                @php
                                                 $newtime = strtotime($order->created_at)
                                               @endphp
                                               {{ $order->time = date('d-M-Y',$newtime)}}
                                            </td>
                                            <td  class="text-center fs-1">
                                                @if($order->order_status=="1")
                                                  <p  class="badge badge-warning text-white">Pendding</p>
                                                @elseif ($order->order_status=="2")
                                                  <p  class="badge badge-primary text-white">Oreder Accept</p>
                                                @elseif ($order->order_status=="3")
                                                <p class="badge badge-success text-white">Oreder On The Way</p>
                                                @elseif($order->order_status=="4")
                                                 <p  class="badge badge-success text-white">Order Delivery Recived</p>
                                                 @elseif($order->order_status=="5")
                                                 <p  class="badge badge-danger text-white">Order Cancel</p>
                                                @endif
                                                 
                                            </td>
                                            <td style="padding-left: 10px;">
                                                <a href="{{ route('my.order.details',$order->id) }}" class="btn btn-success btn-sm">View Details</a>
                                                @if($order->order_status=="1" OR $order->order_status=="2")
                                                <a href="{{ route('my.order.cancel',$order->id) }}" class="btn btn-danger btn-sm">Cancel</a>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                  </table>
                                  
                            </div><!-- .End .tab-pane -->


                            <div class="tab-pane fade" id="tab-downloads" role="tabpanel" aria-labelledby="tab-downloads-link">
                                <div class="row  justify-content-center">
                                    <div class="col-sm-6 ">
                                     <form action="{{ route('password.change') }}" method="POST">
                                        @csrf

                                        <label>Current password </label>
                                        <input type="password" name="old_pass" class="form-control @error('old_pass') is-invalid @enderror" >
                                            @error('old_pass')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                           @enderror
                                        <label>New password</label>
                                        <input type="password" name="new_pass" class="form-control @error('new_pass') is-invalid @enderror" >
                                        @error('new_pass')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                       @enderror
                                        <label>Confirm new password</label>
                                        <input type="password" name="confirm_pass" class="form-control @error('confirm_pass') is-invalid @enderror" >
                                        @error('confirm_pass')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                       @enderror
                                        <button type="submit" class="btn btn-outline-primary-2">
                                            <span>SAVE CHANGES</span>
                                            <i class="icon-long-arrow-right"></i>
                                        </button>
                                </form>
                                </div>
                              </div><!-- End .row -->
                            </div><!-- .End .tab-pane -->

                            <div class="tab-pane fade" id="tab-account" role="tabpanel" aria-labelledby="tab-account-link">
                                <form action="{{ route('update.user.account') }}" method="post">
                                    @csrf
                                    @foreach ($users as  $user)
                                        <div class="row">
                                            <input type="hidden"  name="user_id" value="{{ $user->id }}">
                                            <div class="col-6">
                                                <label>First Name *</label>
                                                <input type="text" class="form-control  @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" >
                                                @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="col-6">
                                                <label>Last Name *</label>
                                                <input type="text" class="form-control  @error('last_name') is-invalid @enderror" name="last_name" value="{{ $user->last_name }}" required>
                                                @error('last_name')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="col-6">
                                                <label>Phone No *</label>
                                                <input type="text" class="form-control  @error('phone') is-invalid @enderror" name="phone" value="{{ $user->phone }}" required>
                                                @error('phone')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-6">
                                                <label>Email Address *</label>
                                                <input type="email" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required>
                                                @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-6">
                                                <label>District Name *</label>
                                                <input type="text" class="form-control  @error('district') is-invalid @enderror" name="district" value="{{ $user->district }}" required>
                                                @error('district')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-6">
                                                <label>Thana Name *</label>
                                                <input type="text" class="form-control  @error('thana') is-invalid @enderror" name="thana" value="{{ $user->thana }}" required>
                                                @error('thana')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-6">
                                                <label>Division *</label>
                                                <input type="text" class="form-control  @error('division') is-invalid @enderror" name="division" value="{{ $user->division }}" required>
                                                @error('division')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-6">
                                                <label>Address/Holdding No *</label>
                                                <input type="text" class="form-control  @error('address_holdding') is-invalid @enderror" name="address_holdding" value="{{ $user->address_holdding }}" required>
                                                @error('address_holdding')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    @endforeach

                                    <button type="submit" class="btn btn-outline-primary-2">
                                        <span>SAVE CHANGES</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </button>
                                </form>
                            </div><!-- .End .tab-pane -->
                        </div>
                    </div><!-- End .col-lg-9 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .dashboard -->
    </div><!-- End .page-content -->
   

</main><!-- End .main -->
@endsection