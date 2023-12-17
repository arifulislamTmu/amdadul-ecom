@if($products_se->count() >=1)
@foreach ($products_se as $all_product)
<div class="modal-dialog1   modal-dialog-centered product_data" role="document">
    <div class="modal-content">
        <style>
            .z-index1{
                z-index: 9999;
                border: 0.5px solid black;
                border-radius: 5px;
                padding: 0px 3px;
                margin: 0;
            }
            .details-action-wrapper .btn-product{
                padding: 7px 64px;
            }
        </style>
        <div class="modal-body">
            <button type="button" class="close z-index1" data-dismiss="modal" aria-label="Close">
                <span class="z-index1" aria-hidden="true"><i class="icon-close"></i></span>
            </button>
            <form action="{{ route('buynow.product') }}" method="post">
                @csrf
            <div class="form-box1">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="product-gallery product-gallery-vertical">
                            <div class="row">
                                <figure class="product-main-image">
                                    <img id="product-zoom" src="{{ asset($all_product->product_img_one) }}"
                                        data-zoom-image="{{ asset($all_product->product_img_one) }}" alt="{{ $all_product->product_name }}">
                                    <a href="#" id="btn-product-gallery" class="btn-product-gallery">
                                        <i class="icon-arrows"></i>
                                    </a>
                                </figure><!-- End .product-main-image -->

                                <div id="product-zoom-gallery" class="product-image-gallery">
                    
                                    <a class="product-gallery-item" href="#"
                                        data-image="{{ asset($all_product->product_img_two) }}"
                                        data-zoom-image="{{ asset($all_product->product_img_two) }}">
                                        <img src="{{ asset($all_product->product_img_two) }}" alt="">
                                    </a>

                                    <a class="product-gallery-item" href="#"
                                        data-image="{{ asset($all_product->product_img_three) }}"
                                        data-zoom-image="{{ asset($all_product->product_img_three) }}">
                                        <img src="{{ asset($all_product->product_img_three) }}" alt="">
                                    </a>
                                    <a class="product-gallery-item" href="#"
                                    data-image="{{ asset($all_product->product_img_four) }}"
                                    data-zoom-image="{{ asset($all_product->product_img_four) }}">
                                    <img src="{{ asset($all_product->product_img_four) }}" alt="">
                                </a>
                                    <a class="product-gallery-item" href="#"
                                        data-image="{{ asset($all_product->product_img_five) }}"
                                        data-zoom-image="{{ asset($all_product->product_img_five) }}">
                                        <img src="{{ asset($all_product->product_img_five) }}" alt="">
                                    </a>
                                    <a class="product-gallery-item" href="#"
                                        data-image="{{ asset($all_product->product_img_six) }}"
                                        data-zoom-image="{{ asset($all_product->product_img_six) }}">
                                        <img src="{{ asset($all_product->product_img_six) }}" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="product-details">
                            <h1 class="product-title">{{ $all_product->product_name }}</h1><!-- End .product-title -->

                            <div class="ratings-container">
                                <div class="ratings">
                                    <div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->
                                </div><!-- End .ratings -->
                                <a class="ratings-text" href="#product-review-link" id="review-link">( 200 Reviews )</a>
                            </div><!-- End .rating-container -->

                            <div class="product-price">
                                <span>&#2547;</span>&nbsp;{{ number_format($all_product->product_price,2) }}
                                <input type="hidden" name="product_price" id="product_price" value="{{ $all_product->product_price }}">
                                <input type="hidden" name="product_id" id="product_id" value="{{ $all_product->id }}">
                            </div><!-- End .product-price -->
                            <div class="product-content">
                               
                                <p> {!!$all_product->sort_description !!}</p>
                            </div><!-- End .product-content -->

                            <div class="details-filter-row details-row-size">
                                <label>Color:</label>
                               @php
                                  $colors = json_decode($all_product->product_color);
                                  $sizes = json_decode($all_product->product_size);
                               @endphp
                                <div class="product-nav product-nav-thumbs">
                                    <select name="product_color" id="product_color" required class="form-control">
                                        <option value="" selected="selected">Select a Color</option>
                                     @foreach ($colors as $color )
                                       <option value="{{ $color}}"> {{ $color}}</option>
                                     @endforeach
                                    </select>
                                </div>
                                <div class="error_msg text-danger ml-5"> </div>
                            </div><!-- End .details-filter-row -->

                            <div class="details-filter-row details-row-size">
                                <label for="size">Size:</label>
                                <div class="select-custom">
                                    <select name="product_size" id="product_size" required class="form-control" required>
                                        <option value="" selected="selected">Select a size</option>
                                        @foreach ($sizes as $size )
                                        <option value="{{ $size}}"> {{ $size}}</option>
                                      @endforeach
                                    </select>
                                </div><!-- End .select-custom -->
                                <div class="error_msg2 text-danger"> </div>
                            </div><!-- End .details-filter-row -->

                            <div class="details-filter-row details-row-size">
                                <label for="qty">Qty:</label>
                                <div class="product-details-quantity">
                                    <input type="number" name="qty" id="qty" class="form-control" value="1" min="1" max="10"
                                        step="1" data-decimals="0" required>
                                </div><!-- End .product-details-quantity -->
                                <div class="error_msg3 text-danger ml-5"> </div>
                            </div><!-- End .details-filter-row -->

                            <div class="product-details-action">
                                <a href="#" class="btn-product btn-cart add_to_cart"><span>Add To Cart</span></a>
                            
                                <div class="details-action-wrapper">
                                    <button href="" class="btn btn-success btn-product btn-cart text-white " title="Buynow"><span> Buy Now</span></button>
                                </div><!-- End .details-action-wrapper -->
                          
                            </div><!-- End .product-details-action -->
                        </div><!-- End .product-details -->
                    </div><!-- End .col-md-6 -->
                </div>
            </div>
        </form>
        </div>
    </div>
</div>
@endforeach

@else
<h1></h1>
@endif