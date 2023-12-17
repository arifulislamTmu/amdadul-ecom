@extends('admin.admin_layouts')

@section('slider') active show-sub @endsection
@section('slider-sub-list') active @endsection
@section('admin_content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ url('/admin/home') }}">Home</a>
            <span class="breadcrumb-item active">Product Page</span>
          </nav>
        <div class="sl-pagebody">
            <div class="row">
                <div class="col-12">
                    <div class="card pd-20 pd-sm-40">
                        <div class="card-body-title">
                            <div class="d-flex justify-content-between align-items-center">
                                Product list 
                                 <a href="{{ route('addslider')}}" class="btn btn-success btn-sm mb-2">Add slider</a>
                            </div>
                        </div>
                        <div class="table-wrapper">
                          <table id="datatable1" class="table display responsive nowrap">
                            <thead>
                              <tr>
                                <th class="">Sl.</th>
                                <th class="">Product name</th>
                                <th class="">Price</th>
                                <th class="">product img</th>
                                <th class="">Product code</th>
                                <th class="">Category name</th>
                                <th class="">Brand name</th>
                                <th class="">Quantity</th>
                                <th class="">status</th>
                                <th class="">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                                $count = 1;
                                ?>
                              @foreach ($products as $product)
                             
                              <tr>
                                <td>{{ $count++ }}</td>
                                <td>{{ $product->product_name  }}</td>
                                <td>{{ $product->product_price }}</td>
                                <td><img src="{{ asset($product->product_img_one) }}" width="50px;" height="50px;" alt=""></td>
                                <td>{{ $product->product_code }}</td>
                                <td>{{ $product->category->category_name }}</td>
                                <td>{{ $product->brand->brand_name }}</td>
                                <td>{{ $product->product_quantity }}</td>
                                <td>
                                  @if ($product->product_status=='1')
                                  <a href="{{ url('slider-status-dactive/'.$product->id)}}" class="p-0 m-0" ><i style="font-size: 25px;" class="icon ion-toggle-filled"></i></a>
                                  @else
                                  <a href="{{ url('slider-status-active/'.$product->id)}}" class="p-0 m-0" ><i style="font-size: 25px;" class="icon ion-toggle"></i></a>
                                  @endif
                                </td>
                                <td>
                                  <a href="{{ url('slider-edit/'.$product->id)}}" class="btn btn-success btn-sm"><i class="icon ion-edit"></i></a>
                                  <a href="{{ route('delete.slider',$product->id) }}" onclick="return confirm('Are you sure to delete this Product ?');" class="btn btn-danger  btn-sm"><i class="icon ion-trash-b"></i></a>
                                </td>
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                        </div><!-- table-wrapper -->
                      </div><!-- card -->
                </div>
            </div>
        </div><!-- sl-pagebody -->
      </div><!-- sl-mainpanel -->

@endsection

