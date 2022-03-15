@extends('user.layouts.app')
@section('title')
    Single Product
@endsection
@section('mainContent')
    <div class="wrapper">
        <section id="page-content" class="page-wrapper section">
            <div class="shop-section mb-80">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9 order-lg-2 order-1">
                            <div class="single-product-area mb-80">
                                <div class="row">
                                    <div class="col-lg-5">
                                        <div class="imgs-zoom-area">
                                            <img id="zoom_03" src="{{ url('uploads/' . $single_product->product_image) }}"
                                                data-zoom-image="{{ url('uploads/' . $single_product->product_image) }}"
                                                alt="" style="height: 300px !important; width: 300px !important;">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div id="gallery_01" class="carousel-btn slick-arrow-3 mt-30">

                                                        <div class="p-c">
                                                            <a href="#"
                                                                data-image="{{ url('uploads/' . $single_product->product_image) }}"
                                                                alt="{{ $single_product->product_image }}"
                                                                data-zoom-image="{{ url('uploads/' . $single_product->product_image) }}"
                                                                alt="{{ $single_product->product_image }}">
                                                                <img src="{{ url('uploads/' . $single_product->product_image) }}"
                                                                    alt="{{ $single_product->product_image }}"
                                                                    style="height: 63px !important; width:57px !important">
                                                            </a>
                                                        </div>

                                                        <?php foreach
                                                        (json_decode($single_product->product_image_gallery) as $name) { ?>
                                                        <div class="p-c">
                                                            <a href="#" data-image="{{ asset('uploads/' . $name) }}"
                                                                data-zoom-image="{{ asset('uploads/' . $name) }}">
                                                                <img class="zoom_03"
                                                                    src="{{ asset('uploads/' . $name) }}" alt=""
                                                                    style="height: 63px !important; width:57px !important">
                                                            </a>
                                                        </div>
                                                        <?php } ?>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- imgs-zoom-area end -->
                                    <!-- single-product-info start -->
                                    <div class="col-lg-7">
                                        <div class="single-product-info">
                                            <h3 class="text-black-1">{{ $single_product->product_name }} </h3>
                                            <h6 class="brand-name-2">{{ $single_product->brand->brand_name }}</h6>
                                            <!--  hr -->
                                            <hr>
                                            <!-- single-pro-color-rating -->
                                            <div class="single-pro-color-rating clearfix">
                                                {{-- <div class="sin-pro-color f-left">
                                                <p class="color-title f-left">Color</p>
                                                <div class="widget-color f-left">
                                                    <ul>
                                                        <li class="color-1"><a href="#"></a></li>
                                                        <li class="color-2"><a href="#"></a></li>
                                                        <li class="color-3"><a href="#"></a></li>
                                                        <li class="color-4"><a href="#"></a></li>
                                                    </ul>
                                                </div>
                                            </div> --}}
                                                <div class="pro-rating sin-pro-rating f-left">
                                                    <a href="#" tabindex="0"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#" tabindex="0"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#" tabindex="0"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#" tabindex="0"><i class="zmdi zmdi-star-half"></i></a>
                                                    <a href="#" tabindex="0"><i class="zmdi zmdi-star-outline"></i></a>
                                                    <span class="text-black-5">( 27 Rating )</span>
                                                </div>
                                            </div>
                                            <!-- hr -->
                                            <hr>
                                            <!-- plus-minus-pro-action -->
                                            <div class="plus-minus-pro-action clearfix">
                                                <div class="sin-plus-minus f-left clearfix">
                                                    <p class="color-title f-left">Qty</p>
                                                    <div class="cart-plus-minus f-left">
                                                        <input type="text" value="1" name="qtybutton"
                                                            class="cart-plus-minus-box number">
                                                    </div>
                                                </div>
                                                <div class="sin-pro-action f-right">
                                                    <ul class="action-button">
                                                        @php
                                                            $wishlist = App\Models\Wishlist::where('product_id', $single_product->id)->get();
                                                        @endphp
                                                        @auth
                                                            @if (sizeof($wishlist))
                                                                <li
                                                                    style="background: #FF7F00; border-color: #FF7F00; color: #fff; border-radius: 50%;">
                                                                    <a href="javascript:void(0)" title="Wishlist"
                                                                        class="wishlist_add"
                                                                        data-id="{{ $single_product->id }}"
                                                                        style="background: transparent;border: 1px solid #ddd;border-radius: 50%;color: #FFF;display: block;font-size: 14px;height: 30px;text-align: center;width: 30px;"><i
                                                                            class="zmdi zmdi-favorite"></i></a>
                                                                </li>
                                                            @else
                                                                <li>
                                                                    <a href="javascript:void(0)" title="Wishlist"
                                                                        data-id="{{ $single_product->id }}"
                                                                        class="wishlist_add"><i
                                                                            class="zmdi zmdi-favorite"></i></a>
                                                                </li>
                                                            @endif
                                                        @else
                                                            <li>
                                                                <a href="javascript:void(0)" data-toggle="modal"
                                                                    data-target=".loginModal" title="Quickview"><i
                                                                        class="zmdi zmdi-favorite"></i></a>
                                                            </li>
                                                        @endauth
                                                        {{-- <li>
                                                        <a href="#" title="Wishlist" tabindex="0"><i
                                                                class="zmdi zmdi-favorite"></i></a>
                                                    </li> --}}
                                                        <li>
                                                            <a href="javascript:void(0)" class="ShowProduct"
                                                                title="Quickview" data-id="{{ $single_product->id }}"><i
                                                                    class="zmdi zmdi-zoom-in"></i></a>
                                                        </li>
                                                        @auth
                                                            <li>
                                                                <a href="javascript:void(0)" title="Add to cart"
                                                                    class="cart_add" data-id="{{ $single_product->id }}"><i
                                                                        class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                            </li>
                                                        @else
                                                            <li>
                                                                <a href="javascript:void(0)" data-toggle="modal"
                                                                    data-target=".loginModal" title="Quickview"><i
                                                                        class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                            </li>
                                                        @endauth
                                                        {{-- <li>
                                                        <a href="#" title="Compare" tabindex="0"><i
                                                                class="zmdi zmdi-refresh"></i></a>
                                                    </li> --}}
                                                        {{-- <li>
                                                        <a href="#" title="Add to cart" tabindex="0"><i
                                                                class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                    </li> --}}
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- plus-minus-pro-action end -->
                                            <!-- hr -->
                                            <hr>
                                            <!-- single-product-price -->
                                            <h3 class="pro-price">Price: &#8377 {!! number_format((float) $single_product->product_price, 2) !!}</h3>
                                            <!--  hr -->
                                            <hr>
                                            <div>
                                                @auth
                                                    <a href="javascript:void(0)"
                                                        class="button extra-small button-black cart_add" tabindex="-1"
                                                        data-id="{{ $single_product->id }}">
                                                        <span class="text-uppercase">Buy now</span>
                                                    </a>
                                                @else
                                                    <a href="javascript:void(0)" class="button extra-small button-black"
                                                        data-toggle="modal" data-target=".loginModal" title="Quickview"
                                                        style="line-height:43px"><span class="text-uppercase">Buy now</span></a>
                                                @endauth

                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-product-info end -->
                                </div>
                                <!-- single-product-tab -->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <!-- hr -->
                                        <hr>
                                        <div class="single-product-tab reviews-tab">
                                            <ul class="nav mb-20">
                                                <li><a class="active" href="#description" data-toggle="tab">description</a>
                                                </li>
                                                <li><a href="#information" data-toggle="tab">information</a></li>
                                                <li><a href="#reviews" data-toggle="tab">reviews</a></li>
                                            </ul>
                                            <div class="tab-content">
                                                <div role="tabpanel" class="tab-pane active show" id="description">
                                                    <p>{!! $single_product->product_details !!}</p>
                                                </div>
                                                <div role="tabpanel" class="tab-pane" id="information">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem,
                                                        neque
                                                        fugit inventore quo dignissimos est iure natus quis nam illo
                                                        officiis,
                                                        deleniti consectetur non ,aspernatur.</p>
                                                    <p>rerum blanditiis dolore dignissimos expedita consequatur deleniti
                                                        consectetur non exercitationem.</p>
                                                </div>
                                                <div role="tabpanel" class="tab-pane" id="reviews">
                                                    <!-- reviews-tab-desc -->
                                                    <div class="reviews-tab-desc">
                                                        <!-- single comments -->
                                                        @if (sizeof($review_detail))
                                                            @foreach ($review_detail as $review)

                                                                <div id="reviewcheck">
                                                                    <div class="media mt-30">
                                                                        <div class="media-left">
                                                                            <a href="#"><img class="media-object"
                                                                                    src="{{ asset('user/img/author/1.jpg') }}"
                                                                                    alt="">
                                                                            </a>
                                                                        </div>
                                                                        <div class=" media-body">
                                                                            <div class="clearfix">
                                                                                <div class="name-commenter pull-left">
                                                                                    <h6 class="media-heading"><a
                                                                                            href="#">{{ $review->user_detail->name }}</a>
                                                                                    </h6>
                                                                                    <p class="mb-10">
                                                                                        {{ date_format($review->created_at, 'd M Y H:iA') }}
                                                                                    </p>

                                                                                </div>
                                                                            </div>
                                                                            <p class="mb-0">{{ $review->review }}</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        @endif
                                                        @auth
                                                            <br>
                                                            <div class="pull-right">
                                                                <ul class="reply-delate">
                                                                    <li><a href="javascript:void(0)"
                                                                            id="btnReplayReview">Reply</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <br>
                                                            {{-- <input type="button" /> --}}
                                                            <form action="" class="form" id="formData">
                                                                <div id="dvReplayReview" style="display: none">
                                                                    <input type="hidden" name="product_id"
                                                                        value="{{ $single_product->id }}">
                                                                    <input type="text" placeholder="Enter The Replay"
                                                                        class="reviewclass" name="review" id="reviewclass" />
                                                                    {{-- <button type="submit" name="submit" id="formSubmit"
                                                                class="btn btn-primary ml-4">Submit</button> --}}
                                                                    <button class="submit-btn-1 btn-hover-1" name="submit"
                                                                        id="formSubmit" type="submit">Reply</button>
                                                                </div>
                                                            </form>
                                                        @else
                                                            <br>
                                                            <div class="pull-right">
                                                                <ul class="reply-delate">
                                                                    <li>
                                                                        <a href="javascript:void(0)"
                                                                            class="single_add_to_cart_button"
                                                                            data-toggle="modal" data-target=".loginModal"
                                                                            title="Quickview" style="line-height:43px">Reply</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        @endauth
                                                        <!-- single comments -->
                                                        {{-- <div class="media mt-30">
                                                        <div class="media-left">
                                                            <a href="#"><img class="media-object"
                                                                    src="{{ asset('user/img/author/2.jpg"') }}
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            alt="
                                                                    #"></a>
                                                        </div>
                                                        <div class="media-body">
                                                            <div class="clearfix">
                                                                <div class="name-commenter pull-left">
                                                                    <h6 class="media-heading"><a href="#">Gerald Barnes</a>
                                                                    </h6>
                                                                    <p class="mb-10">27 Jun, 2019 at 2:30pm</p>
                                                                </div>
                                                                <div class="pull-right">
                                                                    <ul class="reply-delate">
                                                                        <li><a href="#">Reply</a></li>
                                                                        <li>/</li>
                                                                        <li><a href="#">Delate</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <p class="mb-0">Lorem ipsum dolor sit amet, consectetur
                                                                adipiscing elit. Integer accumsan egestas .</p>
                                                        </div>
                                                    </div> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--  hr -->
                                        <hr>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product-area end -->
                            @include('user.pages.product.related')
                        </div>

                        @include('user.theme.fliter')
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('styles')
@endsection
@section('scripts')
    <script type="text/javascript" src="{{ asset('js/product_review.js') }}">
        var Project_Url = '{{ env('Project_Url') }}';

    </script>
@endsection
@section('styles')
@endsection
