@extends('admin.layouts.master')
@section('content')

    <div class="graph-form agile_info_shadow">
        <h3 class="w3_inner_tittle two">Edit Product Form </h3>
        <div class="form-body">
            <form action="{{ route('product.update', ['product' => encrypt($product->id)]) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>
                        <strong>Product Name :</strong>
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="product_name" value="{{ $product->product_name }}"
                        id="product_name" placeholder="Enter Product Name Here..">
                </div>
                @if ($errors->has('product_name'))
                    <div class="alert alert-danger" role="alert" style="padding: 5px">{{ $errors->first('product_name') }}
                    </div>
                @endif
                <div class="form-group">
                    {{-- <label>
                        <strong>Product Details :</strong>
                        <span class="text-danger">*</span>
                    </label> --}}
                    {{-- <input type="text" class="form-control" name="product_details" id="product_details"
                        value="{{ $product->product_details }}" placeholder="Enter Product Details Here.."
                        rows="2"></textarea> --}}
                    <textarea class="ckeditor form-control" id="wysiwyg-editor" name="product_details" id="product_details"
                        value="{{ $product->product_details }}"></textarea>
                </div>
                @if ($errors->has('product_details'))
                    <div class="alert alert-danger" role="alert" style="padding: 5px">
                        {{ $errors->first('product_details') }}</div>
                @endif
                <div class="form-group">
                    <label>
                        <strong>Product Price :</strong>
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="product_price" value="{{ $product->product_price }}"
                        id="product_price" placeholder="Enter Product Price Here..">
                </div>
                @if ($errors->has('product_price'))
                    <div class="alert alert-danger" role="alert" style="padding: 5px">
                        {{ $errors->first('product_price') }}</div>
                @endif
                {{-- Category --}}
                <div class="form-group">
                    <label>
                        <strong>Product Category :</strong>
                        <span class="text-danger">*</span>
                    </label>
                    <select class="form-control1" aria-label="Default select example" name="category_name">
                        <option selected>Select Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @if ($product->category->id == $category->id) {{ 'selected' }} @endif>{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                </div>
                {{-- Brand --}}
                <div class="form-group">
                    <label>
                        <strong>Product Brand :</strong>
                        <span class="text-danger">*</span>
                    </label>
                    <select class="form-control1" aria-label="Default select example" name="brand_name">
                        <option selected>Select Category</option>
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}" @if ($product->brand->id == $brand->id) {{ 'selected' }} @endif>{{ $brand->brand_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>
                        <strong>Product Image :</strong>
                        <span class="text-danger">*</span>
                    </label>
                    <input type="file" name="product_image" value="{{ $product->product_image }}" id="image">

                </div>
                @if ($errors->has('product_image'))
                    <div class="alert alert-danger" role="alert" style="padding: 5px">
                        {{ $errors->first('product_image') }}</div>
                @endif
                <div class="user-image mb-3 text-center">
                    <div class="prdimgPreview"> </div>
                </div>
                <div class="custom-file form-group">
                    <label>
                        <strong>Product Image Gallery :</strong>
                        <span class="text-danger">*</span>
                    </label>
                    <input type="file" name="product_image_gallery[]" value="{{ old('product_image_gallery') }}"
                        class=" custom-file-input form-group" id="images" multiple="multiple">
                </div>
                @if ($errors->has('product_image_gallery'))
                    <div class="alert alert-danger" role="alert" style="padding: 5px">
                        {{ $errors->first('product_image_gallery') }}</div>
                @endif
                <div class="user-image mb-3 text-center">
                    <div class="imgPreview"> </div>
                </div>

                <div class="checkbox">
                    <label> <input type="checkbox"> Check me out </label>
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>

    </div>
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.ckeditor').ckeditor();
        });

    </script>
    <script type="text/javascript">
        CKEDITOR.replace('wysiwyg-editor', {
            filebrowserUploadUrl: "{{ route('product.store', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });

    </script>
    <script>
        $(function() {
            // Multiple images preview with JavaScript
            var multiImgPreview = function(input, imgPreviewPlaceholder) {

                if (input.files) {
                    var filesAmount = input.files.length;

                    for (i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();

                        reader.onload = function(event) {
                            $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(
                                imgPreviewPlaceholder);
                        }

                        reader.readAsDataURL(input.files[i]);
                    }
                }

            };

            $('#images').on('change', function() {
                multiImgPreview(this, 'div.imgPreview');
            });

            $('#image').on('change', function() {
                multiImgPreview(this, 'div.prdimgPreview');
            });
        });

    </script>


@endsection
