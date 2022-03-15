<div id="best-seller" class="tab-pane" role="tabpanel">
    <div class="row">
        @foreach ($best_sellerproducts as $product)
            {{ $product['checkout_list'] }}
            {{-- <div class="col-lg-3 col-md-4">
                <div class="product-item product-item-2">
                    <div class="product-img">
                        <a href="single-product.html">
                            <img src="{{ asset('user/img/product-2/1.jpg') }}" alt="" />
                        </a>
                    </div>
                    <div class="product-info">
                        <h6 class="product-title">
                            <a href="single-product.html">{{ $product->checkout_list[$key]->product_list }}</a>
                        </h6>
                        <h6 class="brand-name"></h6>
                        <h3 class="pro-price">&#8377 869.00</h3>
                    </div>
                    <ul class="action-button">
                        <li>
                            <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite"></i></a>
                        </li>
                        <li>
                            <a href="#" data-toggle="modal" data-target="#productModal" title="Quickview"><i
                                    class="zmdi zmdi-zoom-in"></i></a>
                        </li>
                        <li>
                            <a href="#" title="Compare"><i class="zmdi zmdi-refresh"></i></a>
                        </li>
                        <li>
                            <a href="#" title="Add to cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                        </li>
                    </ul>
                </div>
            </div> --}}
        @endforeach

    </div>
</div>
