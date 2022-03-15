@extends('admin.layouts.master')
@section('content')
    <html>

    <head>
        <style>
            .imgPreview img {
                padding: 10px;
                max-width: 100px;
            }

            .prdimgPreview img {
                position: relative;
                left: 80px;
                top: 2px;

                padding: 10px;
                max-width: 100px;
            }

        </style>

    <body>
        <div class="inner_content">
            <div class="w3l_agileits_breadcrumbs">
                <div class="w3l_agileits_breadcrumbs_inner">
                    <ul>
                        <li><a href="{{ route('dashboard') }}">Home</a><span>«</span></li>
                        <li>Product</li>
                    </ul>
                </div>
            </div>
            <div class="buttons_w3ls_agile">
                <div class="inner_content_w3_agile_info two_in">

                    <div class="agile-tables">
                        <div class="w3l-table-info agile_info_shadow">
                            <h3 class="w3_inner_tittle two"><strong> Product </strong></h3>
                            <button type="button" class="btn btn-primary pull-right" data-toggle="modal"
                                data-target="#exampleModal" onclick="validateError();validateInput();">
                                Add Product
                            </button>
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="form-body">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <h3 class="w3_inner_tittle two">Product Form </h3>
                                                <div class="graph-form agile_info_shadow">
                                                    <div id="divID"></div>
                                                    <form action="" class="form" id="formData">
                                                        <div class="form-group">
                                                            <label>
                                                                <strong>Product Name :</strong>
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <input type="text" class="form-control" name="product_name"
                                                                value="{{ old('product_name') }}" id="product_name"
                                                                placeholder="Enter Product Name Here..">
                                                        </div>
                                                        <span class="text-danger" id="product_name_error"
                                                            role="alert"></span>

                                                        <div class="form-group">
                                                            {{-- <label>
                                                                <strong>Product Details :</strong>
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <textarea type="text" class="form-control"
                                                                name="product_details" id="product_details"
                                                                value="{{ old('product_details') }}"
                                                                placeholder="Enter Product Details Here.."
                                                                rows="3"></textarea> --}}
                                                            <textarea class="ckeditor form-control" i name="product_details"
                                                                id="product_details"
                                                                value="{{ old('product_details') }}"></textarea>
                                                        </div>
                                                        <span class="text-danger" id="product_details_error"
                                                            role="alert"></span>
                                                        <div class="form-group">
                                                            <label>
                                                                <strong>Product Price :</strong>
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <input type="text" class="form-control" name="product_price"
                                                                id="product_price" value="{{ old('product_price') }}"
                                                                placeholder="Enter Product Price Here..">
                                                        </div>
                                                        <span class="text-danger" id="product_price_error"
                                                            role="alert"></span>
                                                        <div class="form-group">
                                                            <label>
                                                                <strong>Product Category :</strong>
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <select class="form-control1"
                                                                aria-label="Default select example" name="category_name">
                                                                <option selected>Select Category</option>
                                                                @foreach ($categories as $category)
                                                                    <option value="{{ $category->id }}">
                                                                        {{ $category->category_name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <span class="text-danger" id="product_category_error"></span>
                                                        <div class="form-group">
                                                            <label>
                                                                <strong>Product Brand :</strong>
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <select class="form-control1"
                                                                aria-label="Default select example" name="brand_name">
                                                                <option selected>Select Brand</option>
                                                                @foreach ($brands as $brand)
                                                                    <option value="{{ $brand->id }}">
                                                                        {{ $brand->brand_name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <span class="text-danger" id="product_category_error"></span>

                                                        <div class="form-group">
                                                            <label>
                                                                <strong>Product Image :</strong>
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <input type="file" name="product_image"
                                                                value="{{ old('product_image') }}" id="image">
                                                            <p class="help-block">Example block-level help text here.</p>
                                                        </div>
                                                        <span class="text-danger" id="product_image_error"></span>

                                                        <div class="user-image mb-3 text-center">
                                                            <div class="prdimgPreview"> </div>
                                                        </div>

                                                        <div class="custom-file form-group">
                                                            <label>
                                                                <strong>Product Image Gallery :</strong>
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <input type="file" name="product_image_gallery[]"
                                                                value="{{ old('product_image_gallery') }}"
                                                                class=" custom-file-input form-group" id="images"
                                                                multiple="multiple">
                                                        </div>
                                                        <div class="user-image mb-3 text-center">
                                                            <div class="imgPreview"> </div>
                                                        </div>

                                                        <div class="checkbox">
                                                            <label> <input type="checkbox"> Check me out </label>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="submit" name="submit" id="formSubmit"
                                                                class="btn btn-primary ml-4">Submit</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <table class=" table">
                                <thead>
                                    <tr>
                                        <th>NO.</th>
                                        <th>Product Name</th>
                                        <th>Category Name</th>
                                        <th>Brand Name</th>
                                        <th>Product Description</th>
                                        <th>Product Price</th>
                                        <th>Product Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>{{ $product->id }}</td>
                                            <td>{{ $product->product_name }}</td>
                                            <td>{{ $product->category->category_name }}</td>
                                            <td>{{ $product->brand->brand_name }}</td>
                                            <td>{{ Str::limit($product->product_details, 20) }}</td>
                                            <td>{{ $product->product_price }}</td>
                                            <td><img src="{{ url('uploads/' . $product->product_image) }}" width="50"
                                                    alt="">
                                            </td>
                                            <td>
                                                <a class="btn btn-success"
                                                    href="{{ route('product.edit', ['product' => encrypt($product->id)]) }}">Edit</a>
                                                <a class="btn btn-danger"
                                                    data-id="{{ route('product.delete', ['product' => encrypt($product->id)]) }}"
                                                    onclick="deleteProductID(event)">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $products->links('pagination::bootstrap-4') }}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    </head>

    </html>
    <script src="{{ asset('js/admin_add_product.js') }}"></script>
    <script src="{{ asset('js/admin_delete_product.js') }}"></script>
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
