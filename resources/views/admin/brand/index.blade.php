@extends('admin.admin_layouts')
@section('brands') active show-sub @endsection
@section('brand-sub') active @endsection
@section('admin_content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ url('/admin/home') }}">Home</a>
            <span class="breadcrumb-item active">Brand Page</span>
          </nav>
        <div class="sl-pagebody">
            <div class="row">
                <div class="col-8">
                    <div class="card pd-20 pd-sm-40">
                        <h6 class="card-body-title">Brand list</h6>
                        <div class="table-wrapper">
                          <table id="datatable1" class="table display responsive nowrap">
                            <thead>
                              <tr>
                                <th class="wd-10p">Sl.</th>
                                <th class="wd-15p">brand name</th>
                                <th class="wd-20p">Status</th>
                                <th class="wd-20p">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                                $count = 1;
                                ?>
                              @foreach ($brands as $brand)
                              <tr>
                                <td>{{ $count++ }}</td>
                                <td>{{ $brand->brand_name }}</td>
                                <td>
                                  @if ($brand->status=='1')
                                  <a href="{{ url('status-dactive/'.$brand->id)}}" class="p-0 m-0" ><i style="font-size: 25px;" class="icon ion-toggle-filled"></i></a>
                                  @else
                                  <a href="{{ url('status-active/'.$brand->id)}}" class="p-0 m-0" ><i style="font-size: 25px;" class="icon ion-toggle"></i></a>
                                  @endif
                                </td>
                                <td>
                                  <a href="{{ route('edit.brand',$brand->id) }}" class="btn btn-success btn-sm"><i class="icon ion-edit"></i></a>
                                  <a href="{{ route('delete.brand',$brand->id) }}" class="btn btn-danger  btn-sm"><i class="icon ion-trash-b"></i></a>
                                </td>
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                        </div><!-- table-wrapper -->
                      </div><!-- card -->
                </div>
                <div class="col-4">
                    <form action="{{ route('add.brand') }}" method="post">
                      @csrf
                        <div class="card pd-20 pd-sm-40 form-layout form-layout-5">
                          <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Create New Brand</h6>
                          <div class="row row-xs">
                            <label class="form-control-label py-2">Brand Name</label>
                              <input type="text" name="brand_name" class="form-control @error('brand_name') is-invalid @enderror" placeholder="Enter brand">
                              @error('brand_name')
                                <span class="text-danger">{{ $message }}</span>
                              @enderror
                          </div><!-- row -->
                          <div class="row row-xs mg-t-30">
                            <div class="col-sm-12 mg-l-auto d-flex justify-content-end">
                              <div class="form-layout-footer">
                                <button class="btn btn-info">Add Brand</button>
                              </div><!-- form-layout-footer -->
                            </div><!-- col-8 -->
                          </div>
                        </div><!-- card -->
                      </form>
                </div>
            </div>
        </div><!-- sl-pagebody -->
      </div><!-- sl-mainpanel -->

@endsection

