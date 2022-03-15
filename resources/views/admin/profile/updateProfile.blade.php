@extends('admin.layouts.master')
@section('content')
    <div class="inner_content">
        <div class="w3l_agileits_breadcrumbs">
            <div class="w3l_agileits_breadcrumbs_inner">
                <ul>
                    <li><a href="{{ route('dashboard') }}">Home</a><span>«</span></li>
                    <li> Profile </li>
                </ul>
            </div>
        </div>
        <div class="inner_content_w3_agile_info two_in">
            <h2 class="w3_inner_tittle">Profile</h2>
            <div class="forms-main_agileits">
                <div class="forms-inner">
                    <div class="set-1_w3ls">
                        <div class="col-md-6 button_set_one agile_info_shadow graph-form">
                            <h3 class="w3_inner_tittle two">Update Profile </h3>
                            <div class="grid-1">
                                <div class="form-body">
                                    <form class="form-horizontal"
                                        action="{{ route('profile.update', ['user' => Auth::user()->id]) }}) }}"
                                        method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group"> <label for="inputEmail3"
                                                class="col-sm-2 control-label">Name</label>
                                            <div class="col-sm-9"> <input type="text" class="form-control" id="name"
                                                    name="name" value="{{ Auth::user()->name }}"> </div>
                                        </div>
                                        @if ($errors->has('name'))
                                            <div class="alert alert-danger" role="alert" style="padding: 5px">
                                                {{ $errors->first('name') }}</div>
                                        @endif
                                        <div class="form-group"> <label for="inputPassword3"
                                                class="col-sm-2 control-label">Email</label>
                                            <div class="col-sm-9"> <input type="email" class="form-control" name="email"
                                                    id="email" value="{{ Auth::user()->email }}"> </div>
                                        </div>
                                        @if ($errors->has('email'))
                                            <div class="alert alert-danger" role="alert" style="padding: 5px">
                                                {{ $errors->first('email') }}</div>
                                        @endif
                                        <div class="form-group">
                                            <label for="inputPassword3" class="col-sm-2 control-label">Image</label>
                                            <div class="col-sm-9">
                                                <input type="file" class="form-control" name="avatar">
                                            </div>
                                        </div>
                                        <div class="form-group"> <label for="inputPassword3"
                                                class="col-sm-2 control-label">Password</label>
                                            <div class="col-sm-9"> <input type="password" class="form-control"
                                                    name="password" id="password" value=""> </div>
                                        </div>
                                        @if ($errors->has('password'))
                                            <div class="alert alert-danger" role="alert" style="padding: 5px">
                                                {{ $errors->first('password') }}</div>
                                        @endif

                                        <div class="col-sm-offset-2"> <button type="submit" class="btn btn-default">Sign
                                                in</button> </div>

                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endsection
