@extends('user.layouts.app')
@section('title')
    Check Out
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
                                    <a class="active" href="{{ route('userside.checkout') }}">
                                        <span>03</span>
                                        Checkout
                                    </a>
                                </li>
                                <li>
                                    <a href="#order-complete" data-toggle="tab">
                                        <span>04</span>
                                        Order complete
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-10">
                            <div class="tab-content">
                                <div class="tab-pane active" id="checkout">
                                    <div class="checkout-content box-shadow p-30">
                                        <form action="{{ route('userside.checkout.store') }}" method="post">
                                            <div class="row">
                                                @csrf
                                                <div class="col-md-6">
                                                    <div class="billing-details pr-10">
                                                        <h6 class="widget-title border-left mb-20">billing details</h6>
                                                        <input type="text" placeholder="Your Name Here..." name="name">
                                                        @if ($errors->has('name'))
                                                            <div class="alert alert-danger" role="alert"
                                                                style="padding: 5px">{{ $errors->first('name') }}
                                                            </div>
                                                        @endif
                                                        <input type="text" placeholder="Email address here..." name="email">
                                                        @if ($errors->has('email'))
                                                            <div class="alert alert-danger" role="alert"
                                                                style="padding: 5px">{{ $errors->first('email') }}
                                                            </div>
                                                        @endif
                                                        <input type="text" placeholder="Phone here..." name="phone">
                                                        @if ($errors->has('phone'))
                                                            <div class="alert alert-danger" role="alert"
                                                                style="padding: 5px">{{ $errors->first('phone') }}
                                                            </div>
                                                        @endif
                                                        <select id="country-dd" class="custom-select" name="country">
                                                            <option value="">Select Country</option>
                                                            @foreach ($countries as $data)
                                                                <option value="{{ $data->id }}">
                                                                    {{ $data->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        <select id="state-dd" class="custom-select" name="state">
                                                            <option value="">Select state</option>
                                                        </select>
                                                        <select id="city-dd" class="custom-select" name="city">
                                                            <option value="">Select City</option>
                                                        </select>
                                                        <textarea class="custom-textarea" placeholder="Your address here..."
                                                            name="address"></textarea>
                                                        @if ($errors->has('address'))
                                                            <div class="alert alert-danger" role="alert"
                                                                style="padding: 5px">{{ $errors->first('address') }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="payment-details pl-10 mb-50">
                                                        <h6 class="widget-title border-left mb-20">our order</h6>
                                                        <table>
                                                            @if (sizeof($cart_detail) > 0)
                                                                @foreach ($cart_detail as $cart)
                                                                    <tr>
                                                                        <td class="td-title-1">
                                                                            {{ $cart->product_list->product_name }}
                                                                        </td>
                                                                        <td class="td-title-2">
                                                                            ${!! number_format((float) $cart->price, 2) !!}
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                                {{-- <tr>
                                                                        <td class="td-title-1">Cart Subtotal</td>
                                                                        <td class="td-title-2">$2410.00</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="td-title-1">Shipping and Handing</td>
                                                                        <td class="td-title-2">$15.00</td>
                                                                    </tr> --}}
                                                                <tr>
                                                                    <td class="td-title-1">Vat</td>
                                                                    <td class="td-title-2">$00.00</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="order-total">Order Total</td>
                                                                    <td class="order-total-price">
                                                                        ${!! number_format((float) $cart_total, 2) !!}
                                                                    </td>
                                                                </tr>
                                                            @endif


                                                        </table>
                                                    </div>
                                                    <div class="payment-method">
                                                        <h6 class="widget-title border-left mb-20">payment method</h6>
                                                        <div id="accordion">
                                                            {{-- <div class="panel">
                                                                <h4 class="payment-title box-shadow">
                                                                    <a data-toggle="collapse" data-parent="#accordion"
                                                                        href="#bank-transfer">
                                                                        direct bank transfer
                                                                    </a>
                                                                </h4>
                                                                <div id="bank-transfer" class="panel-collapse collapse in">
                                                                    <div class="payment-content">
                                                                        <p>Lorem Ipsum is simply in dummy text of the
                                                                            printing and type setting industry. Lorem
                                                                            Ipsum has been.</p>
                                                                    </div>
                                                                </div>
                                                            </div> --}}
                                                            {{-- <div class="panel">
                                                                <h4 class="payment-title box-shadow">
                                                                    <a class="collapsed" data-toggle="collapse"
                                                                        data-parent="#accordion" href="#collapseTwo">
                                                                        cheque payment
                                                                    </a>
                                                                </h4>
                                                                <div id="collapseTwo" class="panel-collapse collapse">
                                                                    <div class="payment-content">
                                                                        <p>Please send your cheque to Store Name, Store
                                                                            Street, Store Town, Store State / County,
                                                                            Store Postcode.</p>
                                                                    </div>
                                                                </div>
                                                            </div> --}}
                                                            <div class="panel">
                                                                <form action="https://www.paypal.com/cgi-bin/webscr"
                                                                    method="post">
                                                                    <input type="hidden" name="cmd" value="_cart">
                                                                    <input type="hidden" name="upload" value="1">
                                                                    <input type="hidden" name="business"
                                                                        value="seller@dezignerfotos.com">
                                                                    <input type="hidden" name="item_name_1"
                                                                        value="Item Name 1">
                                                                    <input type="hidden" name="amount_1" value="1.00">
                                                                    <input type="hidden" name="shipping_1" value="1.75">
                                                                    <input type="hidden" name="item_name_2"
                                                                        value="Item Name 2">
                                                                    <input type="hidden" name="amount_2" value="2.00">
                                                                    <input type="hidden" name="shipping_2" value="2.50">
                                                                    <input type="submit" value="PayPal">
                                                                </form>
                                                                {{-- <h4 class="payment-title box-shadow">
                                                                    <a data-toggle="collapse" data-parent="#accordion"
                                                                        href="#collapseThree">
                                                                        paypal
                                                                    </a>
                                                                </h4>
                                                                <div id="collapseThree" class="panel-collapse collapse">
                                                                    <div class="payment-content">

                                                                        <p>Pay via PayPal; you can pay with your credit
                                                                            card if you don't have a PayPal account.</p>
                                                                        <ul class="payent-type mt-10">
                                                                            <li><a href="#"><img
                                                                                        src="{{ asset('user/img/payment/1.png') }}"
                                                                                        alt=""></a></li>
                                                                            <li><a href="#"><img
                                                                                        src="{{ asset('user/img/payment/2.png') }}"
                                                                                        alt=""></a></li>
                                                                            <li><a href="#"><img
                                                                                        src="{{ asset('user/img/payment/3.png') }}"
                                                                                        alt=""></a></li>
                                                                            <li><a href="#"><img
                                                                                        src="{{ asset('user/img/payment/4.png') }}"
                                                                                        alt=""></a></li>
                                                                        </ul>
                                                                    </div>
                                                                </div> --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button class="submit-btn-1 mt-30 btn-hover-1" type="submit">place
                                                        order</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('styles')
@endsection
@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#country-dd').on('change', function() {
                var idCountry = this.value;

                $("#state-dd").html('');
                $.ajax({
                    url: "{{ route('userside.fetch-states') }}",
                    type: "POST",
                    data: {
                        country_id: idCountry,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#state-dd').html('<option value="">Select State</option>');
                        $.each(result.states, function(key, value) {
                            $("#state-dd").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                        $('#city-dd').html('<option value="">Select City</option>');
                    }
                });
            });

            $('#state-dd').on('change', function() {
                var idState = this.value;
                $("#city-dd").html('');
                $.ajax({
                    url: "{{ route('userside.fetch-cities') }}",
                    type: "POST",
                    data: {
                        state_id: idState,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(res) {
                        $('#city-dd').html('<option value="">Select City</option>');
                        $.each(res.cities, function(key, value) {
                            $("#city-dd").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                    }
                });
            });
        });

    </script>
@endsection
