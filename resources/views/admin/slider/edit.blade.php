@extends('admin.admin_layouts')
@section('slider') active show-sub @endsection
@section('slider-sub') active @endsection
@section('admin_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ url('/admin/home') }}">Home</a>
            <span class="breadcrumb-item active">Product Edit Page</span>
        </nav>
    
        <div class="sl-pagebody">
            @foreach ( $product_edit as $product)
            @php
             $product_sizes = json_decode($product->product_size);
           $product_colors = json_decode($product->product_color);
            @endphp
            <form action="{{ route('update.slider',$product->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="card pd-20 pd-sm-40">
                        <div class="d-flex justify-content-between align-items-center">
                            Update Product
                            <a href="{{ route('slider.list') }}" class="btn btn-success btn-sm mb-2"> Product List</a>
                        </div>
                        <p class="border"></p>
                        <div class="form-layout">
                            <div class="row mg-b-25">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-control-label">Product Name: <span
                                                class="tx-danger">*</span></label>
                                        <input class="form-control" type="text" name="product_name"
                                            value="{{ $product->product_name }}">
                                        @error('product_name')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror

                                    </div>
                                </div><!-- col-4 -->
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-control-label">Product Code: <span
                                                class="tx-danger">*</span></label>
                                        <input class="form-control" type="text" name="product_code"
                                            value="{{ $product->product_code }}">
                                        @error('product_code')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div><!-- col-4 -->
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-control-label">Product Price: <span
                                                class="tx-danger">*</span></label>
                                        <input class="form-control" type="number" name="product_price"
                                            value="{{$product->product_price }}" >
                                        @error('product_price')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group mg-b-10-force">
                                        <label class="form-control-label">Product Quantity: <span
                                                class="tx-danger">*</span></label>
                                        <input class="form-control" type="number" name="product_quantity"
                                            value="{{ $product->product_quantity }}" placeholder="Enter quantity">
                                        @error('product_quantity')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    
                                    
                                    <div class="form-group mg-b-10-force">
                                        <label class="form-control-label"> Brand Name: <span
                                                class="tx-danger">*</span></label>
                                        <select class="form-control select2" name="brand_name"
                                            data-placeholder="Select Brand Name">
                                            <option label="Select Brand Name"></option>
                                            @foreach ($brands as $brand)
                                                <option value="{{ $brand->id }}" {{ $product->brand_name == $brand->id ? "selected":"" }}> {{ $brand->brand_name }}</option>
                                               
                                            @endforeach
                                        </select>
                                        @error('brand_name')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group mg-b-10-force">
                                        <label class="form-control-label"> Category Name: <span
                                                class="tx-danger">*</span></label>
                                        <select class="form-control select2" name="category_name"
                                            data-placeholder="Select Brand Name">
                                            <option label="Select Category Name"></option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}" {{  $category->id == $product->category_name ?"selected":"" }}> {{ $category->category_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('category_name')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                                <style>
                                    .checkbox_valye{
                                       display: flex;
                                      
                                    }
                                    .input_chack .inpou{
                                        width: 20px;
                                        height: 20px;
                                        margin-right:5px;
                                        margin-left: 20px;
                                    }
                                    
                                </style>
                                <div class="col-lg-6">
                                    <label class="">Product Size: <span class="tx-danger">*</span></label>
                                    <div class="checkbox_valye">
                                        <div class="input_chack">
                                            <input class="inpou" type="checkbox" name="product_size[]" value="S" {{ in_array("S",$product_sizes)?'checked':"" }}>
                                        </div>
                                        <div class="name_value">
                                           <h6> Small(S)</h6>
                                        </div>
                                        <div class="input_chack">
                                            <input class="inpou" type="checkbox" name="product_size[]" value="M" {{ in_array("M",$product_sizes)?'checked':"" }}>
                                        </div>
                                        <div class="name_value">
                                           <h6> Meddium(M)</h6>
                                        </div>

                                        <div class="input_chack">
                                            <input class="inpou" type="checkbox" name="product_size[]" value="L" {{ in_array("L",$product_sizes)?'checked':"" }}>
                                        </div>
                                        <div class="name_value">
                                           <h6> Large(L)</h6>
                                        </div>
                                    </div>
                                                                                            
                                    <div class="checkbox_valye mt-3">
                                        <div class="input_chack">
                                            <input class="inpou" type="checkbox" name="product_size[]" value="XS" {{ in_array("XS",$product_sizes)?'checked':"" }}>
                                        </div>
                                        <div class="name_value">
                                           <h6> (XS)</h6>
                                        </div>
                                        <div class="input_chack">
                                            <input class="inpou" type="checkbox" name="product_size[]" value="XL" {{ in_array("XL",$product_sizes)?'checked':"" }}>
                                        </div>
                                        <div class="name_value">
                                           <h6>(XL)</h6>
                                        </div>

                                        <div class="input_chack">
                                            <input class="inpou" type="checkbox" name="product_size[]" value="XXL" {{ in_array("XXL",$product_sizes)?'checked':"" }}>
                                        </div>
                                        <div class="name_value">
                                           <h6> XXL(XXL)</h6>
                                        </div>
                                    </div>
                                    @error('product_size')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                                </div>
                            
                                <div class="col-lg-6 mb-2">
                                    <label class="">Product Color: <span class="tx-danger">*</span></label>
                                    <div class="checkbox_valye">
                                        <div class="input_chack">
                                            <input class="inpou" type="checkbox" name="product_color[]" value="Red" {{ in_array("Red",$product_colors)?'checked':"" }}>
                                        </div>
                                        <div class="name_value">
                                           <h6> Red</h6>
                                        </div>
                                        <div class="input_chack">
                                            <input class="inpou" type="checkbox" name="product_color[]" value="Black" {{ in_array("Black",$product_colors)?'checked':"" }}>
                                        </div>
                                        <div class="name_value">
                                           <h6> Black</h6>
                                        </div>

                                        <div class="input_chack">
                                            <input class="inpou" type="checkbox" name="product_color[]" value="Gray" {{ in_array("Gray",$product_colors)?'checked':"" }}>
                                        </div>
                                        <div class="name_value">
                                           <h6> Gray</h6>
                                        </div>
                                    </div>
                                                                                            
                                    <div class="checkbox_valye mt-3">
                                        <div class="input_chack">
                                            <input class="inpou" type="checkbox" name="product_color[]" value="Yellow" {{ in_array("Yellow",$product_colors)?'checked':"" }}>
                                        </div>
                                        <div class="name_value">
                                           <h6> Yellow</h6>
                                        </div>
                                        <div class="input_chack">
                                            <input class="inpou" type="checkbox" name="product_color[]" value="White" {{ in_array("White",$product_colors)?'checked':"" }}>
                                        </div>
                                        <div class="name_value">
                                           <h6>White</h6>
                                        </div>

                                        <div class="input_chack">
                                            <input class="inpou" type="checkbox" name="product_color[]" value="Parpule" {{ in_array("Parpule",$product_colors)?'checked':"" }}>
                                        </div>
                                        <div class="name_value">
                                           <h6> Parpule </h6>
                                        </div>
                                    </div>
                                    @error('product_color')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                                </div>



                                <div class="col-lg-6">
                                    <div class="form-group mg-b-10-force">
                                        <label class="form-control-label"> Short Description: <span
                                                class="tx-danger">*</span></label>
                                        <textarea  id="summernote" name="sort_description" style="width: 100%; min-height:80px">{{ $product->sort_description }}</textarea>
                                        @error('sort_description')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mg-b-10-force">
                                        <label class="form-control-label"> Long Description: <span
                                                class="tx-danger">*</span></label>
                                        <textarea  id="summernote" name="long_description" style="width: 100%; min-height:80px"> {{ $product->long_description }} </textarea>
                                        @error('long_description')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>

                                </div>
                            </div>
                            <div class="">
                                <button class="btn btn-info mg-r-5">Product slider Data</button>
                            </div>
                        </form>
                     </div>
                     <p class="border mt-1"></p>
                     <form action="{{ route('slider.image',$product->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="image_one" value="{{ $product->product_img_one }}">
                        <input type="hidden" name="image_two" value="{{ $product->product_img_two }}">
                        <input type="hidden" name="image_three" value="{{ $product->product_img_three }}">
                     <div class="row mt-2">
                        
                        <div class="col-lg-4">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group mg-b-10-force">
                                        <label class="form-control-label">Product Image 1: <span
                                                class="tx-danger">*</span></label>
                                        <input class="form-control" type="file" name="product_img_one"
                                            id="file-ip-1" accept="image/*" onchange="showPreview(event);">
                                        @error('product_img_one')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="preview">
                                        <img src="{{ asset($product->product_img_one) }} "class="w-75" id="file-ip-1-preview">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="row">
                                <div class="col-6">
                            
                                    <div class="form-group mg-b-10-force">
                                        <label class="form-control-label">Product Image 2: <span
                                                class="tx-danger">*</span></label>
                                        <input class="form-control" type="file" name="product_img_two"
                                            id="file-ip-2" accept="image/*" onchange="showPreview2(event);">
                                        @error('product_img_two')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="preview">
                                        <img src="{{ asset($product->product_img_two) }}" class="w-75" id="file-ip-2-preview">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group mg-b-10-force">
                                        <label class="form-control-label">Product Image 3: <span
                                                class="tx-danger">*</span></label>
                                        <input class="form-control" type="file" name="product_img_three"
                                            id="file-ip-3" accept="image/*" onchange="showPreview3(event);">
                                        @error('product_img_three')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="preview">
                                        <img src="{{ asset($product->product_img_three) }}"  class="w-75" id="file-ip-3-preview">
                                    </div>
                                </div>
                            </div>
                     
                        </div>
                        <div class="">
                            <button class="btn btn-info mg-l-5">Update Image</button>
                        </div>
                    </div>
                     </form>
                    </div>
                </div>
            @endforeach
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

        function showPreview3(event) {
            if (event.target.files.length > 0) {
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("file-ip-3-preview");
                preview.src = src;
                preview.style.display = "block";
            }
        }
    </script>
@endsection
