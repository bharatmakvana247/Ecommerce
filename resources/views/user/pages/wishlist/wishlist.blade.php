@extends('user.layouts.app')
@section('title')
    Wishlist
@endsection
@section('mainContent')
    <div class="wrapper">
        <section id="page-content" class="page-wrapper section">

            <!-- SHOP SECTION START -->
            <div class="shop-section mb-80">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-2">
                            <ul class="cart-tab">
                                <li>
                                    <a class="active" href="{{ route('userside.cart') }}">
                                        <span>01</span>
                                        Shopping cart
                                    </a>
                                </li>
                                <li>
                                    <a class="active" href="{{ route('userside.wishlist') }}">
                                        <span>02</span>
                                        Wishlist
                                    </a>
                                </li>
                                <li>
                                    <a class="" href="{{ route('userside.checkout') }}">
                                        <span>03</span>
                                        Checkout
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span>04</span>
                                        Order complete
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-10">
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane active" id="wishlist">
                                    <div class="wishlist-content">
                                        <form action="#">
                                            <div class="table-content table-responsive mb-50">
                                                <table class="text-center">
                                                    <thead>
                                                        <tr>
                                                            <th class="product-thumbnail">product</th>
                                                            <th class="product-price">price</th>
                                                            {{-- <th class="product-stock">Stock status</th> --}}
                                                            <th class="product-add-cart">add to cart</th>
                                                            <th class="product-remove">remove</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <!-- tr -->
                                                        @if (sizeof($wishlist_details))
                                                            @foreach ($wishlist_details as $wishlist)
                                                                <tr>
                                                                    <td class="product-thumbnail">
                                                                        <div class="pro-thumbnail-img">
                                                                            <img src="{{ url('uploads/' . $wishlist->product_list->product_image) }}"
                                                                                alt="">
                                                                        </div>
                                                                        <div class="pro-thumbnail-info text-left">
                                                                            <h6 class="product-title-2">
                                                                                <a
                                                                                    href="{{ route('userside.single_product', $wishlist->product_list->id) }}">{{ $wishlist->product_list->product_name }}</a>
                                                                            </h6>
                                                                            <p>Brand:
                                                                                {{ $wishlist->product_list->brand->brand_name }}
                                                                            </p>
                                                                            <p>Model:
                                                                                {{ $wishlist->product_list->category->category_name }}
                                                                            </p>
                                                                            {{-- <p> Color: Black, White</p> --}}
                                                                        </div>
                                                                    </td>
                                                                    <td class="product-price">${{ $wishlist->price }}</td>
                                                                    {{-- <td class="product-stock text-uppercase">in stoct</td> --}}
                                                                    <td class="product-add-cart">
                                                                        <a href="javascript:void(0)" class="add_to_cart"
                                                                            title="Add To Cart"
                                                                            data-id="{{ $wishlist->id }}">
                                                                            <i class="zmdi zmdi-shopping-cart-plus"></i>
                                                                        </a>
                                                                    </td>
                                                                    <td class="product-remove">
                                                                        <a href="javascript:void(0)"
                                                                            data-id="{{ $wishlist->id }}"
                                                                            class="wishlist_remove"><i
                                                                                class="zmdi zmdi-close"></i></a>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        @else
                                                            <tr>
                                                                <td class="product-thumbnail" colspan="5"> Record Not
                                                                    Found...
                                                                </td>
                                                            </tr>
                                                        @endif

                                                    </tbody>
                                                </table>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- wishlist end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- SHOP SECTION END -->

        </section>
    </div>
@endsection
@section('styles')
@endsection
@section('scripts')
@endsection
