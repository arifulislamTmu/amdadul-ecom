@extends('admin.admin_layouts')
@section('categorys') active show-sub @endsection
@section('category-sub') active @endsection
@section('admin_content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ url('/admin/home') }}">Home</a>
            <span class="breadcrumb-item active">Category Edit Page </span>
          </nav>
        <div class="sl-pagebody">
            <div class="row">
                <div class="col-8">
                    <div class="card pd-20 pd-sm-40">
                        <h6 class="card-body-title">Category list</h6>
                        <div class="table-wrapper">
                          <table id="datatable1" class="table display responsive nowrap">
                            <thead>
                              <tr>
                                <th class="wd-10p">Sl.</th>
                                <th class="wd-15p">Category name</th>
                                <th class="wd-20p">Status</th>
                                <th class="wd-20p">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                                $count = 1;
                                ?>
                              @foreach ($categories as $category)
                              <tr>
                                <td>{{ $count++ }}</td>
                                <td>{{ $category->category_name }}</td>
                                <td>
                                  @if ($category->status=='1')
                                  <a href="{{ url('status-dactive/'.$category->id)}}" class="p-0 m-0" ><i style="font-size: 25px;" class="icon ion-toggle-filled"></i></a>
                                  @else
                                  <a href="{{ url('status-active/'.$category->id)}}" class="p-0 m-0" ><i style="font-size: 25px;" class="icon ion-toggle"></i></a>
                                  @endif
                                </td>
                                <td>
                                  <a href="{{ route('edit.category',$category->id) }}" class="btn btn-success btn-sm" ><i class="icon ion-edit"></i></a>
                                  <a href="" class="btn btn-danger  btn-sm"><i class="icon ion-trash-b"></i></a>
                                </td>
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                        </div><!-- table-wrapper -->
                      </div><!-- card -->
                </div>
                <div class="col-4">
                    <form action="{{ route('update.category') }}" method="post">
                      @csrf
                        <div class="card pd-20 pd-sm-40 form-layout form-layout-5">
                          <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Edit Category</h6>
                          <div class="row row-xs">
                            <input type="hidden" name="cat_id" value="{{ $category_S->id }}">
                            <label class="form-control-label py-2">Category Name</label>
                              <input type="text" name="category_name" class="form-control @error('category_name') is-invalid @enderror" value="{{ $category_S->category_name }}">
                              @error('category_name')
                                <span class="text-danger">{{ $message }}</span>
                              @enderror
                          </div><!-- row -->
                          <div class="row row-xs mg-t-30">
                            <div class="col-sm-12 mg-l-auto d-flex justify-content-end">
                              <div class="form-layout-footer">
                                <button class="btn btn-info">Update Category</button>
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

