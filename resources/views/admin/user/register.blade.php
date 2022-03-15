@extends('admin.layouts.auth')
@section('content')
    <div class="pages_agile_info_w3l">
        <div class="over_lay_agile_pages_w3ls two">
            <div class="registration">
                <div class="signin-form profile">
                    <h2>Sign up Form</h2>
                    <div class="login-form">
                        <form action="{{ route('user.customRegister') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="text" name="name" placeholder="Username" value="{{ old('name') }}">
                            @if ($errors->has('name'))
                                <div class="alert alert-danger" role="alert" style="padding: 5px">
                                    {{ $errors->first('name') }}</div>
                            @endif
                            <input type="email" name="email" placeholder="E-mail" value="{{ old('email') }}">
                            @if ($errors->has('email'))
                                <div class="alert alert-danger" role="alert" style="padding: 5px">
                                    {{ $errors->first('email') }}</div>
                            @endif
                            <input type="password" name="password" placeholder="Password" value="{{ old('password') }}">
                            @if ($errors->has('password'))
                                <div class="alert alert-danger" role="alert" style="padding: 5px">
                                    {{ $errors->first('password') }}</div>
                            @endif
                            <input type="password" name="password" placeholder="Confirm Password">
                            @if ($errors->has('password'))
                                <div class="alert alert-danger" role="alert" style="padding: 5px">
                                    {{ $errors->first('password') }}</div>
                            @endif

                            <input type="file" name="avatar">

                            <div class="tp">
                                <input type="submit" value="SIGN UP">
                            </div>
                        </form>
                    </div>
                    <h6><a href="{{ route('user.loginCreate') }}">Sing In?</a>
                        <h6>
                </div>
            </div>
        </div>
    </div>
@endsection
