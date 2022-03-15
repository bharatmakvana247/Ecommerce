$(document).ready(function() {
    $("#slider-range").slider({
        range: true,
        min: 500,
        max: 200000,
        values: [50, 999],
        slide: function(event, ui) {
            
            $("#amount_min").val(ui.values[0]);
            $("#amount_max").val(ui.values[1]);
            var min = ui.values[0];
            var max = ui.values[1];
            $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
            $.ajax({
                url: 'price_filter',
                type: 'get',
                data: {
                    min: min,
                    max: max
                },
                success: function(data) {
                    
                    $(".record").empty();
                    $(".bids").empty();
                    let records = data.products.total;

                    if (data.status == 'success') {
                        $('.bidst').css("display", "none");
                        $('.bids').css("display", "flex");
                        var obj = data.products.data
                        jQuery.each(obj, function(i, val) {
                            if (data.user_id == '' || data.user_id ==
                                'undefined' || data
                                .user_id == null) {
                                cart_add =
                                    `<li><a href="javascript:void(0)" data-toggle="modal" data-target=".loginModal" title="Quickview"><i class="zmdi zmdi-shopping-cart-plus"></i></a></li>`;

                                wishlist =
                                    `<li><a href="javascript:void(0)" data-toggle="modal" data-target=".loginModal" title="Quickview"><i class="zmdi zmdi-favorite"></i></a></li>`;

                            } else {
                                cart_add =
                                    `<li><a href="javascript:void(0)" title="Add to cart" class="cart_add" data-id=${val.id}><i class="zmdi zmdi-shopping-cart-plus"></i></a></li>`;

                                wishlist =
                                    `<li><a href="javascript:void(0)" title="Wishlist" class="wishlist_add active" data-id=${val.id}><i class="zmdi zmdi-favorite"></i></a></li>`;

                            }
                            var image_strReplace = encodeURIComponent(val.product_image.trim());
                            $('.bids').append((
                                `<div class="col-lg-4 col-md-6 ">
                        <div class="product-item">
                        <div class="product-img">
                        <a href=${Project_Url}userside/single_product/${val.id}>
                        <img src=${Project_Url}/uploads/${image_strReplace} alt=${Project_Url}/uploads/${image_strReplace} style="max-height: 262px;">
                        </a>
                        </div>
                        <div class="product-info">
                        <h6 class="product-title">
                        <a href=${Project_Url}userside/single_product/${val.id}>${val.product_name}</a>
                        </h6>
                        <div class="pro-rating">
                        <a href="#"><i class="zmdi zmdi-star"></i></a>
                        <a href="#"><i class="zmdi zmdi-star"></i></a>
                        <a href="#"><i class="zmdi zmdi-star"></i></a>
                        <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                        <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                        </div>
                        <h3 class="pro-price">${val.product_price}</h3>
                        <ul class="action-button">
                        ${wishlist}
                        <li>
                        <a href="javascript:void(0)" class="ShowProduct" title="Quickview" data-id=${val.id}><i class="zmdi zmdi-zoom-in"></i></a>
                        </li>
                        ${cart_add}
                        </ul>
                        </div>
                        </div>
                        </div>`
                            ))
                        });
                        // console.log(records);
                        if (data.status == 'success') {
                            $('.record').append((
                                `  <span>Total Showing: ${records}</span>`
                            ))
                        }

                    } else {

                        $('.bidst').css("display", "none");
                        $('.bids').css("display", "flex");
                        $('.bids').append((
                            `<div class="product-item"> Data Not Found</div>`
                        ))
                        $('.record').append((
                            `<span>Total Showing: 0</span>`
                        ))
                    }

                }
            });
        }

    });
    $("#amount").val("$" + $("#slider-range").slider("values", 0) +
        " - $" + $("#slider-range").slider("values", 1));

});
