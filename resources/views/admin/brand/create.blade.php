@extends('admin.layouts.master')
@section('content')

    <div class="graph-form agile_info_shadow">
        <h3 class="w3_inner_tittle two">Brand Form </h3>
        <div class="form-body">
            <form action="{{ route('brand_store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="brand_name">Product Name :</label>
                    <input type="brand_name" class="form-control" name="brand_name" value="{{ old('brand_name') }}"
                        id="brand_name" placeholder="Enter Brand Name Here..">
                </div>
                @if ($errors->has('brand_name'))
                    <div class="alert alert-danger" role="alert" style="padding: 5px">{{ $errors->first('brand_name') }}
                    </div>
                @endif
                <div>
                    <input type="submit" name="submit" class="btn btn-primary">
                    <input type="reset" name="Cancel" class="btn btn-danger">
                </div>
            </form>
        </div>
    </div>
@endsection
