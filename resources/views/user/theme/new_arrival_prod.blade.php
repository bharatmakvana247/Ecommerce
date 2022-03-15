<div id="new-arrival" class="tab-pane" role="tabpanel">
    <div class="row">
        @if (sizeof($new_arrival_products) > 0)
            @foreach ($new_arrival_products as $new_arrival)
                <div class="col-lg-3 col-md-4">
                    <div class="product-item product-item-2">
                        <div class="product-img">
                            <a href="{{ route('userside.single_product', $new_arrival->id) }}">
                                <img src="{{ url('uploads/' . $new_arrival->product_image) }} "
                                    style="height: 150px; width:260px" alt="" />
                            </a>
                        </div>
                        <div class="product-info">
                            <h6 class="product-title">
                                <a
                                    href="{{ route('userside.single_product', $new_arrival->id) }}">{{ $new_arrival->product_name }}</a>
                            </h6>
                            <h6 class="brand-name">{{ $new_arrival->brand->brand_name }}</h6>
                            <h3 class="pro-price">${!! number_format((float) $new_arrival->product_price, 2) !!}</h3>
                        </div>
                        <ul class="action-button">
                            @php
                                $wishlist = App\Models\Wishlist::where('product_id', $new_arrival->id)->get();
                            @endphp
                            @auth
                                @if (sizeof($wishlist))
                                    <li>
                                        <a href="javascript:void(0)" title="Wishlist" class="wishlist_add active"
                                            data-id="{{ $new_arrival->id }}"><i class="zmdi zmdi-favorite"></i></a>
                                    </li>
                                @else
                                    <li>
                                        <a href="javascript:void(0)" title="Wishlist" data-id="{{ $new_arrival->id }}"
                                            class="wishlist_add"><i class="zmdi zmdi-favorite"></i></a>
                                    </li>
                                @endif
                            @else
                                <li>
                                    <a href="javascript:void(0)" data-toggle="modal" data-target=".loginModal"
                                        title="Quickview"><i class="zmdi zmdi-favorite"></i></a>
                                </li>
                            @endauth
                            <li>
                                <a href="javascript:void(0)" class="ShowProduct" title="Quickview"
                                    data-id="{{ $new_arrival->id }}"><i class="zmdi zmdi-zoom-in"></i></a>
                            </li>
                            @auth
                                <li>
                                    <a href="javascript:void(0)" title="Add to cart" class="cart_add"
                                        data-id="{{ $new_arrival->id }}"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                </li>
                            @else
                                <li>
                                    <a href="javascript:void(0)" data-toggle="modal" data-target=".loginModal"
                                        title="Quickview"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                </li>
                            @endauth
                        </ul>
                    </div>
                </div>
            @endforeach
        @endif


    </div>
</div>
