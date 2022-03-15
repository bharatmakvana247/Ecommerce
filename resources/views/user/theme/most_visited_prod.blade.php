    <div id="popular-product" class="tab-pane active show">
        @if (sizeof($most_visited_products) > 0)

            <div class="row">
                @foreach ($most_visited_products as $item)
                    <div class="col-lg-3 col-md-4">
                        <div class="product-item product-item-2">
                            <div class="product-img">
                                <a href="{{ route('userside.single_product', $item->product_list->id) }}">
                                    <img src="{{ url('uploads/' . $item->product_list->product_image) }} " alt="" />
                                </a>
                            </div>
                            <div class="product-info">
                                <h6 class="product-title">
                                    <a href="single-product.html">{{ $item->product_list->product_name }}</a>
                                </h6>
                                <h6 class="brand-name">{{ $item->product_list->brand->brand_name }}</h6>
                                <h3 class="pro-price">&#8377 {!! $item->product_list->product_price !!}</h3>
                            </div>
                            <ul class="action-button">
                                @php
                                    $wishlist = App\Models\Wishlist::where('product_id', $item->id)->get();
                                @endphp
                                @auth
                                    @if (sizeof($wishlist))
                                        <li>
                                            <a href="javascript:void(0)" title="Wishlist" class="wishlist_add active"
                                                data-id="{{ $item->id }}"><i class="zmdi zmdi-favorite"></i></a>
                                        </li>
                                    @else
                                        <li>
                                            <a href="javascript:void(0)" title="Wishlist" data-id="{{ $item->id }}"
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
                                        data-id="{{ $item->id }}"><i class="zmdi zmdi-zoom-in"></i></a>
                                </li>
                                @auth
                                    <li>
                                        <a href="javascript:void(0)" title="Add to cart" class="cart_add"
                                            data-id="{{ $item->id }}"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
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


            </div>
        @else
            <h4>No Data Found</h4>
        @endif

    </div>
