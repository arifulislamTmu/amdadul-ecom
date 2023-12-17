@extends('admin.admin_layouts')
@section('about') active show-sub @endsection
@section('about-sub') active @endsection
@section('admin_content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ url('/admin/home') }}">Home</a>
            <span class="breadcrumb-item active">About Page</span>
          </nav>
        <div class="sl-pagebody">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('add.about') }}" method="post"  enctype="multipart/form-data">
                      @csrf
                        <div class="card pd-20 pd-sm-40 form-layout form-layout-5">
                          <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Create  About page</h6>
                          <div class="row">
                            <div class="col-sm-6 ">
                                <p>About Heading</p>
                                <input type="text" name="about_heading" class="form-control @error('about_heading') is-invalid @enderror" placeholder="Enter about">
                                @error('about_heading')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <p>About Image</p>
                                <input type="file" name="about_image" class="form-control @error('about_image') is-invalid @enderror">
                                @error('about_image')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-12">
                                <p>About Description</p>
                                <textarea name="about_description" rows="8"  style="width:100%;"></textarea>
                                 @error('about_description')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                          </div>
                          <div class="row row-xs mg-t-30">
                            <div class="col-sm-12 mg-l-auto d-flex justify-content-end">
                              <div class="form-layout-footer">
                                <button class="btn btn-info">Add</button>
                              </div><!-- form-layout-footer -->
                            </div><!-- col-8 -->
                          </div>
                        </div><!-- card -->
                      </form>
                </div>
                <div class="col-12">
                    <div class="card pd-20 pd-sm-40">
                        <h6 class="card-body-title">About list</h6>
                        <div class="table-wrapper">
                          <table id="datatable1" class="table display responsive nowrap">
                            <thead>
                              <tr>
                                <th class="wd-10p">Sl.</th>
                                <th class="wd-15p">About Heading</th>
                                <th class="wd-20p">About Description</th>
                                <th class="wd-20p">Image</th>
                                <th class="wd-20p">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                                $count = 1;
                                ?>
                              @foreach ($abuts_us as $brand)
                              <tr>
                                <td>{{ $count++ }}</td>
                                <td>{{ $brand->about_heding }}</td>
                                <td>{{ $brand->about_us }}</td>
                                <td><img src="{{ asset($brand->about_image) }}" width="80" alt=""></td>
                                <td>
                                  <a href="{{ route('delete.about',$brand->id) }}" class="btn btn-danger  btn-sm"><i class="icon ion-trash-b"></i></a>
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

