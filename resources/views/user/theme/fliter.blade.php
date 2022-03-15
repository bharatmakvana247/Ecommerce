<div class="col-lg-3 order-lg-1 order-2">
    <!-- widget-search -->
    <aside class="widget-search mb-30">
        <form action="" class="autocomplete" name="autocomplete">
            {{-- <input type="text" id="name" name="name" class="form-control"> --}}
            <input type="text" placeholder="Search here..." name="search" id="jayminmodi" autocomplete="off">
            <button type="submit"><i class="zmdi zmdi-search"></i></button>
        </form>
    </aside>
    <!-- widget-categories -->
    <aside class="widget widget-categories box-shadow mb-30">
        <h6 class="widget-title border-left mb-20">Categories</h6>
        <div id="cat-treeview" class="product-cat">
            <ul>
                @if (sizeof($category_list) > 0)
                    @foreach ($category_list as $key => $list)
                        <li class="@if ($list->id == $filterkey) open @else closed @endif"><a href="javascript:void(0)">{{ $list->category_name }}</a>
                            @if (sizeof($list->product_list) > 0)
                                <ul>
                                    @foreach ($list->product_list as $product)
                                        <li><a
                                                href="{{ route('userside.single_product', $product->id) }}">{{ $product->product_name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>

                    @endforeach
                @endif
            </ul>
        </div>
    </aside>
    <!-- shop-filter -->
    <aside class="widget shop-filter box-shadow mb-30">
        <h6 class="widget-title border-left mb-20">Price</h6>
        <div class="price_filter">
            <div class="price_slider_amount">
                <input type="submit" value="Your range :">
                <input type="hidden" id="amount_min" name="price" placeholder="Add Your Price">
                <input type="hidden" id="amount_max" name="price" placeholder="Add Your Price">
                <input type="text" id="amount" name="price" placeholder="Add Your Price" disabled>
            </div>
            <div id="slider-range"> </div>

        </div>
    </aside>

    <!-- widget-product -->
    <aside class="widget widget-product box-shadow">
        <h6 class="widget-title border-left mb-20">recent products</h6>
        <!-- product-item start -->
        @foreach ($recent_products as $product)
            <div class="product-item">
                <div class="product-img">
                    <a href="{{ route('userside.single_product', $product->id) }}">
                        <img src="{{ url('uploads/' . $product->product_image) }} "
                            alt="{{ url('uploads/' . $product->product_image) }} " alt=""
                            style="max-height: 71px; max-width: 78px;" />
                    </a>
                </div>
                <div class="product-info">
                    <h6 class="product-title">
                        <a
                            href="{{ route('userside.single_product', $product->id) }}">{{ $product->product_name }}</a>
                    </h6>
                    <h3 class="pro-price">${!! number_format((float) $product->product_price, 2) !!}</h3>
                </div>
            </div>
        @endforeach
    </aside>
</div>
