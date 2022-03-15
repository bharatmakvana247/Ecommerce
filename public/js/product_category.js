$('#category_list').on('change', function() {
    var category_id = this.value;

    $.ajax({
        type: 'get',
        url: 'category_list',
        data: {
            category_id: category_id
        },
        success: function(data) {
            $(".bids").empty();
            $(".record").empty();

            console.log(data.status);
            if (data.status == 'success') {
                $('.bidst').css("display", "none");
                $('.bids').css("display", "flex");
                let records = data.products.data.length;
                var obj = data.products.data
                jQuery.each(obj, function(i, val) {
                    if (data.user_id == '' || data.user_id == 'undefined' || data
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
                <a href=${Project_Url}/userside/single_product/${val.id}>
                <img src=${Project_Url}/uploads/${image_strReplace} alt="#" style="max-height: 262px;">
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
                if (data.status == 'success') {
                    $('.record').append((
                        `  <span>Total Showing: ${records}</span>`
                    ))
                }

            } else {
                $('.bidst').css("display", "none");
                $('.bids').css("display", "flex");
                $('.bids').append((
                    `<span> Data Not Found</span>`
                ))
                $('.record').append((
                    `<span>Total Showing: 0</span>`
                ))

            }
        }
    });
});