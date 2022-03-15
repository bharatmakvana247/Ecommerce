    @extends('admin.layouts.auth')
    @section('content')
        <div class="pages_agile_info_w3l">
            <div class="over_lay_agile_pages_w3ls">
                <div class=" registration">
                    <div class="signin-form profile">
                        <h2>Sign in Form</h2>
                        <div class="login-form">
                            <form action="{{ route('user.customLogin') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="email" name="email" placeholder="E-mail">
                                @if ($errors->has('email'))
                                    <div class="alert alert-danger" role="alert" style="padding: 5px">
                                        {{ $errors->first('email') }}</div>
                                @endif
                                <input type="password" name="password" placeholder="Password">
                                @if ($errors->has('password'))
                                    <div class="alert alert-danger" role="alert" style="padding: 5px">
                                        {{ $errors->first('password') }}</div>
                                @endif
                                <div class="tp">
                                    <input type="submit" value="SIGN IN">
                                </div>
                            </form>
                        </div>
                        <div class="login-social-grids">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="{{ route('login.google') }}"><i class="fa fa-google"></i></a></li>
                                <li><a href="{{ route('login.github') }}"><i class="fa fa-github"></i></a></li>
                            </ul>
                        </div>
                        <p><a href="{{ route('forget.create') }}"> Forget Password?</a></p>
                        <h6><a href="{{ route('User.RegisterCreate') }}"> Sing Up?</a></h6>
                    </div>
                </div>
            </div>
        </div>



    @endsection
