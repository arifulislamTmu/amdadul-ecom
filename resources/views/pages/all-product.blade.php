@extends('layouts.fontend-master')
@section('product')
    active
@endsection
@section('product_list')
    all-product-list
@endsection
@section('content')
    <main class="main">
        <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">All Product</a></li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="toolbox">
                            <div class="toolbox-right">
                                <div class="toolbox-sort">
                                    <label for="sortby">Sort by:</label>
                                    <div class="select-custom">
                                        <select name="sortby" id="sortby" class="form-control">
                                            <option id="high_peice" value="high_peice" selected="selected">High Price
                                            </option>
                                            <option id="low_price"value="low_price">Lowest Price</option>
                                            <option id="date" value="date">Date</option>
                                        </select>
                                    </div>
                                </div><!-- End .toolbox-sort -->
                            </div><!-- End .toolbox-right -->
                        </div><!-- End .toolbox -->

                        <div class="products mb-3">
                            <div class="row justify-content-center">
                                @foreach ($products as $product)
                                    <div class="col-6 col-md-4 col-lg-4 col-xl-3 product_data">
                                        <div class="product product-7 text-center">
                                            <figure class="product-media">
                                                <span class="product-label label-new">New</span>
                                                <a href=" {{ route('product.details', $product->id) }}">
                                                    <img src="{{ asset($product->product_img_one) }}"
                                                        alt="{{ $product->product_name }}" class="product-image">
                                                </a>
                                                <div class="product-action-vertical">
                                                    <a href="#"
                                                        class="btn-product-icon btn-wishlist btn-expandable"><span>add to
                                                            wishlist</span></a>
                                                    <a href="" class="btn-product-icon btn-quickview"
                                                        title="Quick view"><span>Quick view</span></a>
                                                    <a href="#" class="btn-product-icon btn-compare"
                                                        title="Compare"><span>Compare</span></a>
                                                </div><!-- End .product-action-vertical -->

                                                <div class="product-action">
                                                    <a class="btn-product btn-cart cart_btn_click" href="#product_details"
                                                        data-toggle="modal"><span>BUY NOW</span></a>
                                                    <input type="hidden" class="product_input_id"
                                                        value="{{ $product->id }}">
                                                </div><!-- End .product-action -->
                                            </figure><!-- End .product-media -->

                                            <div class="product-body">
                                                <h3 class="product-title"><a
                                                        href="{{ route('product.details', $product->id) }}">{{ $product->product_name }}</a>
                                                </h3><!-- End .product-title -->
                                                <div class="product-price">
                                                    <span>&#2547; </span>&nbsp;
                                                    {{ number_format($product->product_price, 2) }}
                                                </div><!-- End .product-price -->
                                                <div class="ratings-container">
                                                    <div class="ratings">
                                                        <div class="ratings-val" style="width: 90%;"></div>
                                                        <!-- End .ratings-val -->
                                                    </div><!-- End .ratings -->
                                                    <span class="ratings-text">( 2 Reviews )</span>
                                                </div><!-- End .rating-container -->
                                            </div><!-- End .product-body -->
                                        </div><!-- End .product -->
                                    </div>
                                @endforeach

                            </div><!-- End .row -->
                            <style>
                                .pagination nav {
                                    border: 1px solid #f3d7bb;
                                    padding: 5px 8px;
                                    border-radius: 2px;
                                }
                            </style>

                            <nav aria-label="Page navigation">
                                <ul class="pagination justify-content-center">
                                    {{ $products->links() }}
                                </ul>
                            </nav>
                        </div><!-- End .products -->


                    </div><!-- End .col-lg-9 -->
                    <aside class="col-lg-3 order-lg-first">
                        <div class="sidebar sidebar-shop">
                            <div class="widget widget-clean">
                                <label>Filters:</label>
                                <a href="#" class="sidebar-filter-clear">Clean All</a>
                            </div><!-- End .widget widget-clean -->

                            <div class="widget widget-collapsible">
                                <h3 class="widget-title">
                                    <a data-toggle="collapse" href="#widget-1" role="button" aria-expanded="true"
                                        aria-controls="widget-1">
                                        Category
                                    </a>
                                </h3><!-- End .widget-title -->
                                <style>
                                    .category_pro a {
                                        cursor: pointer;

                                    }
                                </style>
                                <div class="collapse show" id="widget-1">
                                    <div class="widget-body">
                                        <div class="">
                                            @foreach ($categoris as $category)
                                            <div class=" product_data d-flex justify-content-between">

                                                <div class="category_pro">
                                                    <a href="{{ url('product/category',$category->id) }}" class="text-dark">
                                                        {{ $category->category_name }}
                                                    </a>
                                                    <input type="hidden" id="category_id" value="{{ $category->id }}">
                                                </div><!-- End .custom-checkbox -->
                                                <div>
                                                    @php
                                                        $count_product = App\Product::where('category_name', $category->id)->count();
                                                    @endphp
                                                    <a href="{{ url('product/category',$category->id) }}" class="text-dark">
                                                     <span class="item-count">({{ $count_product }})</span>
                                                  </a>
                                                </div>
                                            </div><!-- End .filter-item -->

                                            @endforeach
                                        </div><!-- End .filter-items -->
                                    </div><!-- End .widget-body -->
                                </div><!-- End .collapse -->
                            </div><!-- End .widget -->

                            {{-- <div class="widget widget-collapsible">
                            <h3 class="widget-title">
                                <a data-toggle="collapse" href="#widget-2" role="button" aria-expanded="true" aria-controls="widget-2">
                                    Size
                                </a>
                            </h3>

                            <div class="collapse show" id="widget-2">
                                <div class="category_pro">
                                        <button class="my_button_s border-0 bg-white" value="S"> Small(S)</button>
                                        <br>
                                        <button class="my_button_m border-0 bg-white" value="M"> Medium(M)</button>
                                        <br>
                                        <button class="my_button_l border-0 bg-white" value="L"> Large(L)</button>
                                        <br>
                                        <button class="my_button_xl border-0 bg-white" value="XL"> Exra Large(XL)</button>
                                        <br>
                                        <button class="my_button_xxl border-0 bg-white" value="XL"> Double XL(XXl)</button>

                                </div>
                            </div>
                        </div> --}}

                            {{-- <div class="widget widget-collapsible">
                            <h3 class="widget-title">
                                <a data-toggle="collapse" href="#widget-3" role="button" aria-expanded="true" aria-controls="widget-3">
                                    Colour
                                </a>
                            </h3>

                            <div class="collapse show" id="widget-3">
                                <div class="widget-body">
                                    <div class="filter-colors">
                                        <a href="#" style="background: #b87145;"><span class="sr-only">Color Name</span></a>
                                        <a href="#" style="background: #f0c04a;"><span class="sr-only">Color Name</span></a>
                                        <a href="#" style="background: #333333;"><span class="sr-only">Color Name</span></a>
                                        <a href="#" style="background: #cc3333;"><span class="sr-only">Color Name</span></a>
                                        <a href="#" style="background: #3399cc;"><span class="sr-only">Color Name</span></a>
                                        <a href="#" style="background: #669933;"><span class="sr-only">Color Name</span></a>
                                        <a href="#" style="background: #f2719c;"><span class="sr-only">Color Name</span></a>
                                        <a href="#" style="background: #ebebeb;"><span class="sr-only">Color Name</span></a>
                                    </div>
                                </div>
                            </div>
                        </div> --}}

                            <div class="widget widget-collapsible">
                                <h3 class="widget-title">
                                    <a data-toggle="collapse" href="#widget-5" role="button" aria-expanded="true"
                                        aria-controls="widget-5">
                                        Price
                                    </a>
                                </h3><!-- End .widget-title -->
                                <div class="collapse show" id="widget-5">

                                    <div class="price-input">
                                        <div class="field">
                                            <span>Min</span>
                                            <input type="number" class="input-min" value="500" readonly>
                                        </div>
                                        <div class="separator">-</div>
                                        <div class="field">
                                            <span>Max</span>
                                            <input type="number" class="input-max" value="2000" readonly>
                                        </div>
                                    </div>
                                    <div class="slider">
                                        <div class="progress"></div>
                                    </div>
                                    <div class="range-input">
                                        <input type="range" id="range_price_left" class="range-min" min="0"
                                            max="2000" value="500" step="50">
                                        <input type="range" id="range_price_right" class="range-max" min="0"
                                            max="2000" value="1200" step="50">
                                    </div>
                                </div><!-- End .collapse -->

                            </div><!-- End .widget -->
                            <hr>
                            <div class="widget widget-collapsible">
                                <h3 class="widget-title">
                                    <a data-toggle="collapse" href="#widget-4" role="button" aria-expanded="true"
                                        aria-controls="widget-4">
                                        Brand
                                    </a>
                                </h3><!-- End .widget-title -->

                                <div class="collapse show" id="widget-4">
                                    <div class="">
                                        @foreach ($brands as $brand)
                                            <div class=" product_data d-flex justify-content-between">
                                                <div class="category_pro">
                                                    <a  href="{{ url('product/brand',$brand->id) }}" class="text-dark"> {{ $brand->brand_name }}</a>
                                                    <input type="hidden" id="brand_id" value="{{ $brand->id }}">
                                                </div><!-- End .custom-checkbox -->
                                                <div>
                                                    @php
                                                        $count_product = App\Product::where('brand_name', $brand->id)->count();
                                                    @endphp
                                                <a  href="{{ url('product/brand',$brand->id) }}" class="text-dark">
                                                    <span class="item-count">({{ $count_product }})</span>
                                                </a>
                                                </div>

                                            </div><!-- End .filter-item -->
                                        @endforeach
                                    </div><!-- End .filter-items -->
                                </div><!-- End .collapse -->
                            </div><!-- End .widget -->
                            <style>
                                * {
                                    margin: 0;
                                    padding: 0;
                                    box-sizing: border-box;

                                }

                                .wrapper {
                                    /* width: 400px; */
                                    background: #fff;
                                    border-radius: 10px;
                                    padding: 20px 25px 40px;
                                    box-shadow: 0 12px 35px rgba(0, 0, 0, 0.1);
                                }

                                .price-input {
                                    width: 100%;
                                    display: flex;
                                    margin: 11px 0 15px;
                                    font-size: 18px;
                                }

                                .price-input .field {
                                    display: flex;
                                    width: 100%;
                                    height: 45px;
                                    align-items: center;
                                }

                                .field input {
                                    width: 100% !important;
                                    height: 100% !important;
                                    outline: none;
                                    font-size: 19px;
                                    margin-left: 12px;
                                    border-radius: 5px;
                                    text-align: center;
                                    border: none;
                                }

                                input[type="number"]::-webkit-outer-spin-button,
                                input[type="number"]::-webkit-inner-spin-button {
                                    -webkit-appearance: none;
                                }

                                .price-input .separator {
                                    width: 130px;
                                    display: flex;
                                    font-size: 19px;
                                    align-items: center;
                                    justify-content: center;
                                }

                                .slider {
                                    height: 5px;
                                    position: relative;
                                    background: #ddd;
                                    border-radius: 5px;
                                }

                                .slider .progress {
                                    height: 100%;
                                    left: 28%;
                                    right: 40%;
                                    position: absolute;
                                    border-radius: 5px;
                                    background: #17A2B8;
                                }

                                .range-input {
                                    position: relative;
                                }

                                .range-input input {
                                    position: absolute;
                                    width: 100%;
                                    height: 5px;
                                    top: -5px;
                                    background: none;
                                    pointer-events: none;
                                    -webkit-appearance: none;
                                    -moz-appearance: none;
                                }

                                input[type="range"]::-webkit-slider-thumb {
                                    height: 17px;
                                    width: 17px;
                                    border-radius: 50%;
                                    background: #17A2B8;
                                    pointer-events: auto;
                                    -webkit-appearance: none;
                                    box-shadow: 0 0 6px rgba(0, 0, 0, 0.05);
                                }

                                input[type="range"]::-moz-range-thumb {
                                    height: 17px;
                                    width: 17px;
                                    border: none;
                                    border-radius: 50%;
                                    background: #17A2B8;
                                    pointer-events: auto;
                                    -moz-appearance: none;
                                    box-shadow: 0 0 6px rgba(0, 0, 0, 0.05);
                                }

                                .input-spinner .form-control {
                                    padding: 2px;
                                    height: auto;
                                    border-color: #dadada;
                                    background-color: #fff;
                                }
                            </style>

                        </div><!-- End .sidebar sidebar-shop -->
                    </aside><!-- End .col-lg-3 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .page-content -->
        <style>
            .modal-dialog1 {
                max-width: 1024px !important;
                margin: 0 auto !important;
            }
        </style>
        {{-- ============================== Product Details Modal Ajax start ============================================  --}}
        <div class="modal  search-result add_to_cart_modal_close" id="product_details" tabindex="-1" role="dialog"
            aria-hidden="true">
            <div class="search-result">
                @include('pages.search_result')
            </div>
        </div>
        {{-- ============================== Product Details Modal Ajax END ============================================  --}}

        <script src="{{ asset('frotend') }}/assets/js/price_range.js"></script>

    </main>
@endsection
