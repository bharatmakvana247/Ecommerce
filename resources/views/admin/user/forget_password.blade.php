@extends('admin.layouts.auth')
@section('content')
    <div class="pages_agile_info_w3l">
        <div class="over_lay_agile_pages_w3ls">
            <div class="registration">
                <div class="signin-form profile">
                    <h2>Forget Password</h2>
                    <div class="login-form">
                        <form action="{{ route('forget.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="email" name="email" placeholder="Please Enter E-mail">
                            @if ($errors->has('email'))
                                <div class="alert alert-danger" role="alert" style="padding: 5px">
                                    {{ $errors->first('email') }}</div>
                            @endif

                            <div class="tp">
                                <input type="submit" value="forget Password">
                            </div>
                        </form>
                    </div>
                    <h6><a href="{{ route('dashboard') }}">Home</a></h6>
                </div>
            </div>
        </div>
    </div>
@endsection
