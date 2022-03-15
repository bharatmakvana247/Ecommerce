@extends('admin.layouts.master')
@section('content')
    <div class="graph-form agile_info_shadow">
        <h3 class="w3_inner_tittle two">Category Form </h3>
        <div class="form-body">
            <form action="{{ route('category_store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="brand_name">Category Name :</label>
                    <input type="category_name" class="form-control" name="category_name"
                        value="{{ old('category_name') }}" id="category_name" placeholder="Enter Category Name Here..">
                </div>
                @if ($errors->has('category_name'))
                    <div class="alert alert-danger" role="alert" style="padding: 5px">
                        {{ $errors->first('category_name') }}
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
