@extends('admin.admin_layouts')

@section('products')
    active show-sub
@endsection
@section('product-sub-list')
    active
@endsection
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
                                <a href="{{ route('addproduct') }}" class="btn btn-success btn-sm mb-2">Add Product</a>
                            </div>
                        </div>

                        <div class="table-wrapper">
                            <table id="datatable1" class="table display responsive nowrap">
                                <thead>
                                    <tr>
                                        <th class="">Sl.</th>
                                        <th class="">Product</th>
                                        <th class="">Price</th>
                                        <th class="">Discount(%)</th>
                                        <th class="">img</th>
                                        {{-- <th class="">Product code</th> --}}
                                        <th class="">Category</th>
                                        <th class="">Brand</th>
                                        <th class="">Deals</th>
                                       
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
                                            <td>{{ Illuminate\Support\Str::limit($product->product_name, 10) }}</td>
                                            <td>{{ $product->product_price }}</td>
                                            <td>{{ $product->discout ??0 }}</td>
                                            <td><img src="{{ asset($product->product_img_one) }}" width="50px;"
                                                    height="50px;" alt=""></td>
                                            {{-- <td>{{ $product->product_code }}</td> --}}
                                            <td>{{ $product->category->category_name }}</td>
                                            <td>{{ $product->brand->brand_name }}</td>
                                            <td>
                                                <button type="button" class="btn btn-primary btn-sm"
                                                    onclick="modalShow('{{ $product->id }}', '{{ $product->product_price }}','{{ $product->product_name }}');"
                                                    data-toggle="modal" data-target="#exampleModal">
                                                    Add discount
                                                </button>
                                            </td>
                                            <td>
                                                @if ($product->product_status == '1')
                                                    <a href="{{ url('prod-status-dactive/' . $product->id) }}"
                                                        class="p-0 m-0"><i style="font-size: 25px;"
                                                            class="icon ion-toggle-filled"></i></a>
                                                @else
                                                    <a href="{{ url('prod-status-active/' . $product->id) }}"
                                                        class="p-0 m-0"><i style="font-size: 25px;"
                                                            class="icon ion-toggle"></i></a>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ url('product-edit/' . $product->id) }}"
                                                    class="btn btn-success btn-sm"><i class="icon ion-edit"></i></a>
                                                <a href="{{ route('delete.product', $product->id) }}"
                                                    onclick="return confirm('Are you sure to delete this Product ?');"
                                                    class="btn btn-danger  btn-sm"><i class="icon ion-trash-b"></i></a>
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


    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog  modal-md w-100" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add discount </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('price.discount.add') }}" method="post">
                  @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-7">
                                <label for="">Product name : <Strong id="product_name"> </Strong> </label>
                            </div>
                            <div class="col-5">
                                <label for="">Product price: <Strong id="product_price"> </Strong></label>
                                <input type="hidden" id="product_price_input" name="product_price_old">
                                <input type="hidden" id="product_id" name="product_id">
                            </div>
                            <div class="col-7">
                                <label for="">Product discount(%)</label>
                                <input type="number" id="discout"class="form-control" name="discout">
                            </div>
                            <div class="col-5">
                                <label for="">Discount price</label>
                                <input type="text" id="discout_price" class="form-control" name="discout_price" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                        <button class="btn btn-primary btn-sm">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.7.1.slim.min.js"
    integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $('#discout').on('keyup', function() {
            var dicount = $(this).val();
            var product_price_input = $('#product_price_input').val();
            var discouted_price = (product_price_input * dicount) / 100;
            var discout_price = product_price_input - discouted_price;
            $('#discout_price').val(discout_price);

        });
    });

    function modalShow(id, price, name) {
        $('#product_name').text(name);
        $('#product_price').text(price);
        $('#product_price_input').val(price);
        $('#product_id').val(id);
        $('#discout_price').val(0);
        $('#dicount').val(' ');
    }
</script>
