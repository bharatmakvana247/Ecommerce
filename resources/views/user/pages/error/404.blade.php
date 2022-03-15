@extends('user.layouts.app')
@section('title')
    404
@endsection
@section('mainContent')
    <div id="page-content" class="page-wrapper section">
        <div class="error-section mb-80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="error-404 box-shadow">
                            <img src="{{ asset('user/img/others/error.jpg') }}" alt="">
                            <div class="go-to-btn btn-hover-2">
                                <a href="{{ route('userside') }}">go to home page</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@section('styles')
@endsection
@section('scripts')
@endsection
