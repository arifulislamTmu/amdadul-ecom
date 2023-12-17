<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })

    $(document).ready(function() {
        $(document).on("click", ".cart_btn_click", function(e) {
            e.preventDefault();
            var product_id = $(this).closest(".product_data").find(".product_input_id").val();
            // alert( product_id)
            $.ajax({
                type: "GET",
                url: "/product/detail/ajax",
                data: {
                    product_id: product_id
                },
                success: function(response) {
                    $('.search-result').html(response);
                }
            });

        });

        $(document).on("click", ".add_to_cart", function(e) {
            e.preventDefault();
            var product_price = $(this).closest(".product_data").find("#product_price").val();
            var product_size = $(this).closest(".product_data").find("#product_size").val();
            var product_color = $(this).closest(".product_data").find("#product_color").val();
            var product_id = $(this).closest(".product_data").find("#product_id").val();
            var qty = $(this).closest(".product_data").find("#qty").val();

            if (product_color == "") {
                $('.error_msg').html("Please select color");
            } else {
                $('.error_msg').html("");
            }
            if (product_size == "") {
                $('.error_msg2').html("Please select size");
            } else {
                $('.error_msg2').html("");
            }
            if (qty == "") {
                $('.error_msg3').html("Please set quantity");
            } else {
                $('.error_msg3').html("");
            }
            // alert( product_id );
            $.ajax({
                type: "GET",
                url: "/product/add-to-cart/" +product_id,
                data: {
                    product_id: product_id,
                    product_size: product_size,
                    product_price: product_price,
                    product_color: product_color,
                    qty: qty
                },
                success: function(res) {
                    alertify.set("notifier", "position", "top-right");
                    alertify.success("Product add Cart");

                    $("#cart_realaod").load(location.href + " #cart_realaod");
                   
                   $(".add_to_cart_modal_close").css("display","none");
                   $(".modal-backdrop").css("display","none");
                   $("body").removeClass("modal-open");
                }
            });

        });

        // ==========  remove cart product ===================
        $(document).on("click", "#cart_remove_id", function(e) {
            e.preventDefault();
            var cart_id = $(this).closest(".product_data").find("#cart_remove_id_valu").val();
            //  alert(cart_id);
            $.ajax({
                type: "GET",
                url: "/product/cart/remove",
                data: {
                    cart_id: cart_id
                },
                success: function(res) {
                    alertify.set("notifier", "position", "top-right");
                    alertify.warning("Cart Product Remove");
                    $("#cart_realaod").load(location.href + " #cart_realaod");
                    $("#cart_realaod_table").load(location.href + " #cart_realaod_table");

                }
            });

        });
        // ==========  remove cart product ===================

        // ==========  Quantity update cart product ===================
        $(document).on("click", ".btn-increment_men", function(e) {
            e.preventDefault();
            var cart_id = $(this).closest(".product_data").find("#cart_remove_id_valu").val();
            var qty = $(this).closest(".product_data").find("#qty").val();
            //  alert(cart_id+qty);
            $.ajax({
                type: "GET",
                url: "/product/cart/update",
                data: {
                    cart_id: cart_id
                },
                success: function(res) {
                    alertify.set("notifier", "position", "top-right");
                    alertify.success("Cart Quantity Updated");
                    $("#cart_realaod").load(location.href + " #cart_realaod");
                    $("#cart_realaod_table").load(location.href + " #cart_realaod_table");

                }
            });

        });

        // ==========   Quantity update product ===================

        // ==========  Quantity update cart product ===================
        $(document).on("click", ".btn-decrement_men", function(e) {
            e.preventDefault();
            var cart_id = $(this).closest(".product_data").find("#cart_remove_id_valu").val();
            var qty = $(this).closest(".product_data").find("#qty").val();
            //  alert(cart_id+qty);
            $.ajax({
                type: "GET",
                url: "/product/cart/decriment",
                data: {
                    cart_id: cart_id
                },
                success: function(res) {
                    alertify.set("notifier", "position", "top-right");
                    alertify.success("Cart Quantity Decriment");
                    $("#cart_realaod").load(location.href + " #cart_realaod");
                    $("#cart_realaod_table").load(location.href + " #cart_realaod_table");

                }
            });

        });

        // ==========   Quantity update product ===================

        // ========== Pagenition  product All product ===================
        $(document).on("click", ".pagination a", function(e) {
            e.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            product(page)

            function product(page) {
                $.ajax({
                    type: "GET",
                    url: "/pagenation/paginate-data?page=" + page,
                    success: function(res) {
                        $('.products').html(res);
                    }
                });
            }

        });

        // ==========  Pagenition  product All product ===================

        // ========== Category  product search ===================
        $(document).on("click", ".category_id_click", function(e) {
            e.preventDefault();
            var category_id = $(this).closest(".product_data").find("#category_id").val();
            // alert(category_id)
            $.ajax({
                type: "GET",
                url: "/product/category/search",
                data: {
                    category_id: category_id
                },
                success: function(res) {
                    $('.products').html(res);
                }
            });

        });

        // ==========  Category  product search ===================

        // ==========  size  product search ===================
        // $('.my_button_s').click(function() {
        //     var size = $(this).val();
        //     $.ajax({
        //         type: "GET",
        //         url: "/product/size/search",
        //         data: {
        //             size: size
        //         },
        //         success: function(res) {
        //             $('.products').html(res);
        //         }
        //     });

        // });
      
        // ==========  size  range parice search ===================

        $(document).on('change', '.range-input', function() {
            var max_range = $('#range_price_left').val();
            var min_range = $('#range_price_right').val();
            //  alert( max_range + min_range);
             $.ajax({
                type: "GET",
                url: "/product/price/search",
                data: {
                    max_range: max_range,
                    min_range: min_range,
                },
                success: function(res) {
                    $('.products').html(res);
                }
            });

        });


        $(document).on('change', '#sortby', function() {
            var sort_by_type =  $(this).val();
            //   alert(sort_by_type);
            $.ajax({
                type: "GET",
                url: "/product/soft/by",
                data: {
                    sort_by_type: sort_by_type,
                },
                success: function(res) {
                    $('.products').html(res);
                }
            });

        });
// brand product search 
        $(document).on("click", ".brnad_id_click", function(e) {
            e.preventDefault();
            var brand_id = $(this).closest(".product_data").find("#brand_id").val();
            // alert(brand_id )
            $.ajax({
                type: "GET",
                url: "/product/brand/search",
                data: {
                    brand_id: brand_id
                },
                success: function(res) {
                    $('.products').html(res);
                }
            });

        });

     // wishlist product add 
        $(document).on("click", ".btn-wishlist", function(e) {
            e.preventDefault();
            var product_id = $(this).closest(".product_data").find(".product_input_id").val();
            // alert( product_id)
            $.ajax({
                type: "GET",
                url: "add/wishlist/",
                data: {
                    product_id: product_id,
                },
                success: function(response) {
                    alertify.set("notifier", "position", "top-right");
                    alertify.success("Product add wishlist");
                }
            });

        });


    });


</script>

