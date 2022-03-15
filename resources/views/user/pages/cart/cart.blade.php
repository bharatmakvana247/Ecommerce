@extends('user.layouts.app')
@section('title')
    Add To Cart
@endsection
@section('mainContent')
    <div class="wrapper">
        <section id="page-content" class="page-wrapper section">
            <div class="shop-section mb-80">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-2">
                            <ul class="cart-tab">
                                <li>
                                    <a class="active" href="#shopping-cart">
                                        <span>01</span>
                                        Shopping cart
                                    </a>
                                </li>
                                <li>
                                    <a class="" href="{{ route('userside.wishlist') }}">
                                        <span>02</span>
                                        Wishlist
                                    </a>
                                </li>
                                <li>
                                    <a class="" href="#">
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
                            <div class="tab-content">
                                <div class="tab-pane active" id="shopping-cart">
                                    <div class="shopping-cart-content">
                                        <form action="#">
                                            <div class="table-content table-responsive mb-50">
                                                <table class="text-center">
                                                    <thead>
                                                        <tr>
                                                            <th class="product-thumbnail">product</th>
                                                            <th class="product-price">price</th>
                                                            <th class="product-quantity">Quantity</th>
                                                            <th class="product-subtotal">total</th>
                                                            <th class="product-remove">remove</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if (sizeof($cart_detail) > 0)
                                                            @foreach ($cart_detail as $cart)
                                                                <tr>
                                                                    <td class="product-thumbnail">
                                                                        <div class="pro-thumbnail-img">
                                                                            <img src="{{ url('uploads/' . $cart->product_list->product_image) }}"
                                                                                alt="">
                                                                        </div>
                                                                        <div class="pro-thumbnail-info text-left">
                                                                            <h6 class="product-title-2">
                                                                                <a
                                                                                    href="{{ route('userside.single_product', $cart->product_list->id) }}">{{ $cart->product_list->product_name }}</a>
                                                                            </h6>
                                                                            <p>Brand:
                                                                                {{ $cart->product_list->brand->brand_name }}
                                                                            </p>
                                                                            <p>Model:
                                                                                {{ $cart->product_list->category->category_name }}
                                                                            </p>
                                                                        </div>
                                                                    </td>
                                                                    <td class="product-price">
                                                                        ${!! number_format((float) $cart->price, 2) !!}</td>
                                                                    <td class="product-quantity">
                                                                        <div class="cart-plus-minus f-left">
                                                                            <input type="text" data-id="{{ $cart->id }}"
                                                                                value="{{ $cart->quantity }}"
                                                                                name="quantity"
                                                                                class="cart-plus-minus-box quantity">

                                                                        </div>

                                                                    </td>
                                                                    <td class="product-subtotal">${!! number_format((float) $cart->total, 2) !!}
                                                                    </td>
                                                                    <td class="product-remove">
                                                                        <a href="javascript:void(0)"
                                                                            data-id="{{ $cart->id }}"
                                                                            class="cart_remove"><i
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
                                            <div class="row">
                                                {{-- <div class="col-md-6">
                                                <div class="coupon-discount box-shadow p-30 mb-50">
                                                    <h6 class="widget-title border-left mb-20">coupon discount</h6>
                                                    <p>Enter your coupon code if you have one!</p>
                                                    <input type="text" name="name" placeholder="Enter your code here.">
                                                    <button class="submit-btn-1 black-bg btn-hover-2" type="submit">apply
                                                        coupon</button>
                                                </div>
                                            </div> --}}
                                                <div class="col-md-12">
                                                    <div class="payment-details box-shadow p-30 mb-50">
                                                        <h6 class="widget-title border-left mb-20">payment details</h6>
                                                        <table>
                                                            <tr>
                                                                <td class="td-title-1">Cart Subtotal</td>
                                                                <td class="td-title-2">$
                                                                    {!! number_format((float) $cart_total, 2) !!}</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="td-title-1">Discount</td>
                                                                <td class="td-title-2">$00.00</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="td-title-1">Vat</td>
                                                                <td class="td-title-2">$00.00</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="order-total">Order Total</td>
                                                                <td class="order-total-price">${!! number_format((float) $cart_total, 2) !!}</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- <div class="row">
                                            <div class="col-md-12">
                                                <div class="culculate-shipping box-shadow p-30">
                                                    <h6 class="widget-title border-left mb-20">culculate shipping</h6>
                                                    <p>Enter your coupon code if you have one!</p>
                                                    <div class="row">
                                                        <div class="col-sm-4 col-xs-12">
                                                            <input type="text" placeholder="Name">
                                                        </div>
                                                        <div class="col-sm-4 col-xs-12">
                                                            <input type="text" placeholder="email">
                                                        </div>
                                                        <div class="col-sm-4 col-xs-12">
                                                            <input type="text" placeholder="Country">
                                                        </div>
                                                        <div class="col-sm-4 col-xs-12">
                                                            <input type="text" placeholder="Country">
                                                        </div>
                                                        <div class="col-sm-4 col-xs-12">
                                                            <input type="text" placeholder="Region / State">
                                                        </div>
                                                        <div class="col-sm-4 col-xs-12">
                                                            <input type="text" placeholder="Post code">
                                                        </div>
                                                        <div class="col-md-12">
                                                            <button class="submit-btn-1 black-bg btn-hover-2">get a
                                                                quote</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}
                                        </form>
                                    </div>
                                </div>
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
    <script>
        $(document).ready(function() {
            $(document).on("click", ".qtybutton", function(e) {
                const $this = $(this);
                console.log(this);
            });
        });
        //     $(".qtybutton").on("click", function() {

        //         var qty = $(".quantity").val();
        //         alert(qty);
        //         // // var id = $(".qty_cart").attr('data-id');
        //         // var id = $(this).data("id")
        //         // console.log("id", id);
        //         // console.log("qty", qty);
        //     });
        // });

    </script>
@endsection
