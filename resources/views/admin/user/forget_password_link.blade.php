@extends('admin.layouts.master')
@section('content')

    <div class="pages_agile_info_w3l">
        <div class="over_lay_agile_pages_w3ls">
            <div class="registration">
                <div class="signin-form profile">
                    <h2>Reset Password</h2>
                    <div class="login-form">
                        <form action="{{ route('reset.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">
                            <input type="email" name="email" placeholder="Please Enter E-mail">
                            @if ($errors->has('email'))
                                <div class="alert alert-danger" role="alert" style="padding: 5px">
                                    {{ $errors->first('email') }}</div>
                            @endif

                            <input type="password" name="password" placeholder="Please Enter New password">
                            @if ($errors->has('password'))
                                <div class="alert alert-danger" role="alert" style="padding: 5px">
                                    {{ $errors->first('password') }}</div>
                            @endif

                            <input type="password" name="password_confirmation" placeholder="Please Enter confirm password">
                            @if ($errors->has('password_confirmation'))
                                <div class="alert alert-danger" role="alert" style="padding: 5px">
                                    {{ $errors->first('password_confirmation') }}</div>
                            @endif

                            <div class="tp">
                                <input type="submit" value="Reset Password">
                            </div>
                        </form>
                    </div>
                    <h6><a href="{{ route('dashboard') }}">Home</a></h6>
                </div>
            </div>
        </div>
    </div>

@endsection
