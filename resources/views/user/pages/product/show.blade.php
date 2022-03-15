<div class="modal-product clearfix">
    <div class="product-images">
        <div class="main-image images">
            <img alt="" src="{{ url('uploads/' . $product->product_image) }}">
        </div>
    </div><!-- .product-images -->

    <div class="product-info">
        <h1>{{ $product->product_name }}</h1>
        <div class="price-box-3">
            <div class="s-price-box">
                <span class="new-price">£{!! number_format((float) $product->product_price, 2) !!}</span>
                {{-- <span class="old-price">£190.00</span> --}}
            </div>
        </div>
        <a href="{{ route('userside.single_product', $product->id) }}" class="see-all">See all features</a>
        <div class="quick-add-to-cart">
            <form method="post" class="cart">
                <div class="numbers-row">
                    <input type="number" id="french-hens" class="number" value="3">
                </div>
                @auth
                    <a href="javascript:void(0)" class="single_add_to_cart_button cart_add" title="Quickview"
                        data-id="{{ $product->id }}" style="line-height:43px">Add to cart</a>
                @else
                    <a href="javascript:void(0)" class="single_add_to_cart_button" data-toggle="modal"
                        data-target=".loginModal" title="Quickview" style="line-height:43px">Add to cart</a>
                @endauth
            </form>
        </div>
        <div class="quick-desc">
            {{ $product->product_details }}
        </div>
        {{-- <div class="social-sharing">
            <div class="widget widget_socialsharing_widget">
                <h3 class="widget-title-modal">Share this product</h3>
                <ul class="social-icons clearfix">
                    <li>
                        <a class="facebook" href="#" target="_blank" title="Facebook">
                            <i class="zmdi zmdi-facebook"></i>
                        </a>
                    </li>
                    <li>
                        <a class="google-plus" href="#" target="_blank" title="Google +">
                            <i class="zmdi zmdi-google-plus"></i>
                        </a>
                    </li>
                    <li>
                        <a class="twitter" href="#" target="_blank" title="Twitter">
                            <i class="zmdi zmdi-twitter"></i>
                        </a>
                    </li>
                    <li>
                        <a class="pinterest" href="#" target="_blank" title="Pinterest">
                            <i class="zmdi zmdi-pinterest"></i>
                        </a>
                    </li>
                    <li>
                        <a class="rss" href="#" target="_blank" title="RSS">
                            <i class="zmdi zmdi-rss"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div> --}}
    </div>
</div>
