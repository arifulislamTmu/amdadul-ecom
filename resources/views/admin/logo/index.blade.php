@extends('admin.admin_layouts')
@section('slider-logo') active show-sub @endsection
@section('logo-sub') active @endsection
@section('admin_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ url('/admin/home') }}">Home</a>
            <span class="breadcrumb-item active">logo Page</span>
        </nav>
        <div class="sl-pagebody">
            <form action="{{ route('add.logo') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="card pd-20 pd-sm-40">
                        <p class="border"></p>
                        <div class="form-layout">
                            <div class="row mg-b-25">
                                <div class="col-lg-6">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group mg-b-10-force">
                                                <label class="form-control-label">Header Logo </label>
                                                <input class="form-control" type="file" name="product_img_one"
                                                    id="file-ip-1" accept="image/*" onchange="showPreview(event);">
                                                @error('product_img_one')
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="preview">
                                                <img class="w-75" id="file-ip-1-preview">
                                            </div>
                                        </div>
                                        <div class="logo">
                                            <img src="{{ asset($logo->header_logo) }}" width="100px;" height="100px;" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group mg-b-10-force">
                                                <label class="form-control-label"> Footer Logo </label>
                                                <input class="form-control" type="file" name="product_img_two"
                                                    id="file-ip-2" accept="image/*" onchange="showPreview2(event);">
                                                @error('product_img_two')
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="preview">
                                                <img class="w-75" id="file-ip-2-preview">
                                            </div>
                                        </div>
                                        <div class="logo">
                                            <img src="{{ asset($logo->footer_logo) }}" width="100px;" height="100px;" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-layout-footer">
                                <button class="btn btn-info mg-r-5">Logo Added</button>
                            </div><!-- form-layout-footer -->
                        </div><!-- form-layout -->
                    </div><!-- card -->
                </div>
            </form>
        </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->
    <script>
        function showPreview(event) {
            if (event.target.files.length > 0) {
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("file-ip-1-preview");
                preview.src = src;
                preview.style.display = "block";
            }
        }

        function showPreview2(event) {
            if (event.target.files.length > 0) {
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("file-ip-2-preview");
                preview.src = src;
                preview.style.display = "block";
            }
        }
    </script>
@endsection
