<header class="header-area header-wrapper">
    {{-- <header class="header-area header-wrapper header-2"> --}}

    <!-- header-middle-area -->
    <div id="sticky-header" class="header-middle-area plr-185">
        <div class="container-fluid">
            <div class="full-width-mega-dropdown">
                <div class="row">
                    <!-- logo -->
                    <div class="col-lg-2 col-md-4">
                        <div class="logo">
                            <a href="{{ route('userside') }}">
                                <img src="{{ asset('user/img/logo/logo.png') }}" alt="main logo">
                            </a>
                        </div>
                    </div>
                    <!-- primary-menu -->
                    <div class="col-lg-8 d-none d-lg-block">
                        <nav id="primary-menu">
                            <ul class="main-menu text-center">
                                <li>
                                    <a href="{{ route('userside') }}">Home</a>
                                </li>
                                <li class="mega-parent">
                                    <a href="{{ route('userside.product') }}">Products</a>
                                </li>
                                <li>
                                    <a href="{{ route('userside.about') }}">About us</a>
                                </li>
                                <li>
                                    <a href="{{ route('userside.contact') }}">Contact</a>
                                </li>
                                @auth
                                    <li>
                                        <a href="{{ route('userside.chat') }}">Chat</a>
                                    </li>
                                @endauth
                                {{-- <li>
                                    <a href=""> Welcome - {{ Auth::user()->name }}</a>

                                    <ul class="dropdwn">
                                        <a href="">
                                            <li class="mean-last">
                                                @auth
                                                    <a href="{{ route('logout') }}">Logout</a>
                                                @else
                                                    <a href="{{ route('user.loginCreate') }}">Register/Login</a>
                                                @endauth
                                            </li>
                                        </a>
                                    </ul>
                                </li> --}}

                            </ul>

                        </nav>
                    </div>
                    <!-- header-search & total-cart -->
                    <div class="col-lg-2 col-md-8">
                        <div class="search-top-cart  f-right">
                            <!-- header-search -->
                            <div class="header-search header-search-2 f-left">
                                <div class="header-search-inner">
                                    <button class="search-toggle">
                                        <i class="zmdi zmdi-search"></i>
                                    </button>
                                    <form action="#">
                                        <div class="top-search-box">
                                            <input type="text" placeholder="Search here your product...">
                                            <button type="submit">
                                                <i class="zmdi zmdi-search"></i>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            @auth
                                <div class="header-account header-account-2 f-left">
                                    <ul class="user-meta">
                                        <li>
                                            @auth
                                                <a href="#">
                                                    <img class="img-circle" src="{{ url('uploads/' . Auth::user()->avatar) }}"
                                                        style="width: 25px; height: 25px;" alt="#">
                                                </a>
                                            @endauth

                                            <ul>
                                                <li><a href="{{ route('userside.profile.edit') }}">My Account</a></li>
                                                <li><a href="{{ route('logout') }}">Logout</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            @else
                                <div class="header-account header-account-2 f-left">
                                    <ul class="user-meta">
                                        <li><a href="#"><i class="zmdi zmdi-view-headline"></i></a>
                                            <ul>
                                                <li><a href="{{ route('user.loginCreate') }}">Register/Login</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            @endauth
                            <!-- total-cart -->
                            @auth
                                @php
                                    
                                    $wishlist_count = App\Models\Wishlist::where('user_id', Auth::user()->id)->count();
                                @endphp

                                <div class="total-cart total-cart-2 f-left">
                                    <div class="total-cart-in">
                                        <div class="cart-toggler">
                                            <a href="{{ route('userside.wishlist') }}">
                                                <span class="cart-quantity">{{ $wishlist_count }}</span><br>
                                                <span class="cart-icon">
                                                    <i class="zmdi zmdi-favorite"></i>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>



                            @endauth
                            @auth
                                @php
                                    $cart_detail = App\Models\Cart::with('product_list', 'product_list.brand', 'product_list.category')
                                        ->where('user_id', Auth::user()->id)
                                        ->where('status', 'pading')
                                        ->get();
                                    $cart_sum = App\Models\Cart::where('user_id', Auth::user()->id)
                                        ->where('status', 'pading')
                                        ->sum('total');
                                    $cart_count = App\Models\Cart::where('user_id', Auth::user()->id)
                                        ->where('status', 'pading')
                                        ->count();
                                @endphp
                                <div class="total-cart total-cart-2 f-left">
                                    <div class="total-cart-in">
                                        <div class="cart-toggler">
                                            <a href="#">
                                                <span class="cart-quantity">{{ $cart_count }}</span><br>
                                                <span class="cart-icon">
                                                    <i class="zmdi zmdi-shopping-cart-plus"></i>
                                                </span>
                                            </a>
                                        </div>
                                        <ul style="height: 700px; overflow:auto;">
                                            <li>
                                                <div class="top-cart-inner your-cart">
                                                    <h5 class="text-capitalize">Your Cart</h5>
                                                </div>
                                            </li>
                                            @if (sizeof($cart_detail) > 0)
                                                @foreach ($cart_detail as $cart)
                                                    <li>
                                                        <div class="total-cart-pro">
                                                            <!-- single-cart -->
                                                            <div class="single-cart clearfix">
                                                                <div class="cart-img f-left">
                                                                    <a href="#">
                                                                        <img src="{{ url('uploads/' . $cart->product_list->product_image) }}"
                                                                            alt="Cart Product"
                                                                            style="height: 100px; width:100px" />
                                                                    </a>
                                                                    <div class="del-icon">
                                                                        <a href="javascript:void(0)" class="cart_remove"
                                                                            data-id="{{ $cart->id }}">
                                                                            <i class="zmdi zmdi-close"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div class="cart-info f-left">
                                                                    <h6 class="text-capitalize">
                                                                        <a
                                                                            href="{{ route('userside.single_product', $cart->product_list->id) }}">{{ Str::limit($cart->product_list->product_name, 20) }}</a>
                                                                    </h6>
                                                                    <p>
                                                                        <span>Brand
                                                                            <strong>:</strong></span>{{ $cart->product_list->brand->brand_name }}
                                                                    </p>
                                                                    <p>
                                                                        <span>Model
                                                                            <strong>:</strong></span>{{ $cart->product_list->category->category_name }}
                                                                    </p>
                                                                    <p>
                                                                        <span>Price
                                                                            <strong>:</strong></span>{{ $cart->price }}
                                                                    </p>
                                                                    {{-- <p>
                                                                        <span>Color <strong>:</strong></span>Black, White
                                                                    </p> --}}
                                                                </div>
                                                            </div>
                                                            <!-- single-cart -->
                                                        </div>
                                                    </li>
                                                @endforeach
                                            @else
                                                <li>
                                                    <div class="total-cart-pro">
                                                        <!-- single-cart -->
                                                        <div class="single-cart clearfix">
                                                            <div class="cart-info f-center">
                                                                <h6 class="text-capitalize" style="text-align: center">
                                                                    <a href="javascript:void(0)">Not Data Found...</a>
                                                                </h6>
                                                            </div>
                                                        </div>
                                                        <!-- single-cart -->
                                                    </div>
                                                </li>
                                            @endif
                                            <li>
                                                <div class="top-cart-inner subtotal">
                                                    <h4 class="text-uppercase g-font-2">
                                                        Total =
                                                        <span>&#8377 {!! number_format((float) $cart_sum, 2) !!}</span>
                                                    </h4>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="top-cart-inner view-cart">
                                                    <h4 class="text-uppercase">
                                                        <a href="{{ route('userside.cart') }}">View cart</a>
                                                    </h4>
                                                </div>
                                            </li>
                                            {{-- <li>
                                                <div class="top-cart-inner check-out">
                                                    <h4 class="text-uppercase">
                                                        <a href="#">Check out</a>
                                                    </h4>
                                                </div>
                                            </li> --}}
                                        </ul>
                                    </div>
                                </div>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- END HEADER AREA -->

<!-- START MOBILE MENU AREA -->
<div class="mobile-menu-area d-block d-lg-none section">
    <div class="container mean-container">
        {{-- <div class="mean-bar">
            <a href="#nav" class="meanmenu-reveal"
                style="right: 0px; left: auto; text-align: center; text-indent: 0px; font-size: 18px;"><span></span><span></span><span></span></a>
            <nav class="mean-nav">
                <ul style="display: none;">
                    <li><a href="{{ route('userside') }}">Home</a>

                    </li>
                    <li>
                        <a href="{{ route('userside.product') }}">Products</a>
                    </li>
                    <li><a href="#">Pages</a>

                        <a class="mean-expand" href="#" style="font-size: 18px">+</a>
                    </li>
                    <li><a href="blog.html">Blog</a>

                    </li>
                    <li>
                        <a href="about.html">About Us</a>
                    </li>
                    <li class="mean-last">
                        <a href="contact.html">Contact</a>
                    </li>
                    <li class="mean-last">
                        <a href="{{ route('userside.login') }}">Register/Login</a>
                    </li>
                </ul>
            </nav>
        </div> --}}
        <div class="row">
            <div class="col-lg-12">
                <div class="mobile-menu">
                    <div class="mean-push"></div>
                    <nav id="dropdown" style="display: none;">
                        <ul>
                            <li><a href="{{ route('userside') }}">Home</a>

                            </li>
                            <li>
                                <a href="{{ route('userside.product') }}">Products</a>
                            </li>
                            <li>
                                <a href="{{ route('userside.about') }}">About us</a>
                            </li>
                            <li>
                                <a href="{{ route('userside.contact') }}">Contact</a>
                            </li>
                            @auth
                                <li class="mean-last">
                                    <a href="{{ route('logout') }}">Logout</a>
                                </li>
                            @else
                                <li class="mean-last">
                                    <a href="{{ route('userside.login') }}">Register/Login</a>
                                </li>
                            @endauth
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
