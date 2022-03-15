<div class="slider-area plr-185 mb-80 section">
    <div class="container-fluid">
        <div class="slider-content">
            <div class="active-slider-1 slick-arrow-1 slick-dots-1">
                @foreach ($slider_products as $val)
                    <div class="col-lg-12">
                        <div class="layer-1">
                            <div class="slider-img">
                                <a href="{{ route('userside.single_product', $val->id) }}">
                                    <img src="{{ url('uploads/' . $val->product_image) }}" alt=""
                                        style="width: 744px; height:558px;">
                                </a>
                            </div>
                            <div class="slider-info gray-bg">
                                <div class="slider-info-inner">
                                    <h1 class="slider-title-1 text-uppercase text-black-1">
                                        {{ Str::limit($val->product_name, 20) }}
                                    </h1>
                                    <div class="slider-brief text-black-2">
                                        {!! Str::limit($val->product_details, 586) !!}
                                    </div>

                                    @auth
                                        <a href="javascript:void(0)" title="Add to cart" data-id="{{ $val->id }}"
                                            class="button extra-small button-black cart_add">
                                            <span class="text-uppercase">Buy now</span>
                                        </a>
                                    @else
                                        <a href="javascript:void(0)" data-toggle="modal" data-target=".loginModal"
                                            class="button extra-small button-black ">
                                            <span class="text-uppercase">Buy now</span>
                                        </a>
                                    @endauth
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
