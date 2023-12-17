@extends('admin.admin_layouts')
@section('order') active show-sub @endsection
@section('order-sub') active @endsection
@section('admin_content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ url('/admin/home') }}">Home</a>
            <span class="breadcrumb-item active">Order Page</span>
          </nav>
        <div class="sl-pagebody">
            <div class="row">
                <div class="col-12">
                    <div class="card pd-20 pd-sm-40">
                        <h6 class="card-body-title">Order Product  Details</h6>
                        <div class="table-wrapper">
                          <table id="" class="table display responsive nowrap">
                            <thead>
                              <tr>
                                <th class="wd-10p">Sl.</th>
                                <th class="wd-15p">P.Name</th>
                                <th class="wd-15p">P.image</th>
                                <th class="wd-20p">P.Price</th>
                                <th class="wd-20p">P.Size</th>
                                <th class="wd-20p">P.Qty</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                                $count = 1;
                                ?>
                              @foreach ($order_items AS $order)
                              <tr>
                                <td>{{ $count++ }}</td>
                                <td>{{ $order->product->product_name }}</td>
                                <td> <img src="{{ asset($order->product->product_img_one ) }}" style="width: 50px;" alt=""></td>
                                <td>{{ $order->product->product_price }}</td>
                                <td>{{ $order->product_size }}</td>
                                <td>{{ $order->product_qty }}</td>
                               </tr>
                              @endforeach
                            </tbody>
                          </table>
                        </div><!-- table-wrapper -->
                        <H5>Shipping Details</H5>
                        <form>
                            <fieldset disabled>
                          @foreach ($shipping as $ship )
                             <div class="row">
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="disabledTextInput" class="form-label">First Name</label>
                                        <input type="text" id="disabledTextInput" class="form-control" value="{{ $ship->frist_name }}">
                                      </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="disabledTextInput" class="form-label">Last Name</label>
                                        <input type="text" id="disabledTextInput" class="form-control"value="{{ $ship->last_name }}">
                                      </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="disabledTextInput" class="form-label">Shipping E-mail</label>
                                        <input type="text" id="disabledTextInput" class="form-control" value="{{ $ship->email }}">
                                      </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="disabledTextInput" class="form-label">Shipping Phone</label>
                                        <input type="text" id="disabledTextInput" class="form-control" value="{{ $ship->phone }}">
                                      </div>
                                </div>
                                <div class="col-4">
                                  <div class="mb-3">
                                      <label for="disabledTextInput" class="form-label">Shipping Address</label>
                                      <p> House/holding no :  {{ $ship->address_holdding }}, &nbsp; &nbsp; Thana:  {{ $ship->thana }}, <br class="mb-2">
                                        District:  {{ $ship->district }}, &nbsp; &nbsp; &nbsp; &nbsp; Division: {{ $ship->division }}</p>
                                    </div>
                              </div>
                             </div>
                             @endforeach
                            </fieldset>
                          </form>

                      </div>
                </div>
        
            </div>
        </div><!-- sl-pagebody -->
      </div><!-- sl-mainpanel -->

@endsection

