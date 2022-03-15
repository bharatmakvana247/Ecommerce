@extends('user.layouts.app')
@section('title')
    Conatct Page
@endsection
@section('mainContent')
    <div class="wrapper">
        <section id="page-content" class="page-wrapper section">
            <div class="address-section mb-80">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="contact-address box-shadow">
                                <i class="zmdi zmdi-pin"></i>
                                <h6>Shapath - 4</h6>
                                <h6>Near Crown Plaza, Ahmedabad</h6>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="contact-address box-shadow">
                                <i class="zmdi zmdi-phone"></i>
                                <h6><a href="tel:0123456789"></a></h6>
                                <h6><a href="tel:0123456789">0123456789</a></h6>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="contact-address box-shadow">
                                <i class="zmdi zmdi-email"></i>
                                <h6></h6>

                                <h6>ia@example.com</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="message-box-section mt--50 mb-80">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="message-box box-shadow white-bg">
                                <form id="contact-form" action="{{ route('userside.contact.store') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h4 class="blog-section-title border-left mb-30">get in touch</h4>
                                        </div>

                                        <div class="col-lg-6">
                                            <input type="hidden" name="status" value="contact">
                                            <input type="text" name="name" placeholder="Your name here">
                                        </div>
                                        <div class="col-lg-6">
                                            @if ($errors->has('name'))
                                                <div class="alert alert-danger" role="alert" style="padding: 5px">
                                                    {{ $errors->first('name') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-lg-6">
                                            <input type="text" name="email" placeholder="Your email here">
                                        </div>
                                        <div class="col-lg-6">
                                            @if ($errors->has('email'))
                                                <div class="alert alert-danger" role="alert" style="padding: 5px">
                                                    {{ $errors->first('email') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-lg-6">
                                            <input type="text" name="subject" placeholder="Subject here">
                                        </div>
                                        <div class="col-lg-6">
                                            @if ($errors->has('subject'))
                                                <div class="alert alert-danger" role="alert" style="padding: 5px">
                                                    {{ $errors->first('subject') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-lg-6">
                                            <input type="text" name="phone" placeholder="Your phone here">
                                        </div>
                                        <div class="col-lg-6">
                                            @if ($errors->has('phone'))
                                                <div class="alert alert-danger" role="alert" style="padding: 5px">
                                                    {{ $errors->first('phone') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-lg-12">
                                            <textarea class="custom-textarea" name="message"
                                                placeholder="Message"></textarea>
                                            <div class="col-lg-12">
                                                @if ($errors->has('message'))
                                                    <div class="alert alert-danger" role="alert" style="padding: 5px">
                                                        {{ $errors->first('message') }}
                                                    </div>
                                                @endif
                                            </div>
                                            <button class="submit-btn-1 mt-30 btn-hover-1" type="submit">submit
                                                message</button>
                                        </div>

                                    </div>
                                </form>
                                <p class="form-messege"></p>
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
@endsection
