@extends('admin.layouts.master')
@section('content')

    <!-- /inner_content-->
    <div class="inner_content">
        <!-- /inner_content_w3_agile_info-->


        <!-- breadcrumbs -->
        <!-- //breadcrumbs -->
        <div class="buttons_w3ls_agile">
            <div class="inner_content_w3_agile_info two_in">

                <div class="agile-tables">
                    <div class="w3l-table-info agile_info_shadow">
                        <h3 class="w3_inner_tittle two"><strong> Brand </strong></h3>
                        <!-- tables -->
                        {{-- Button Add Product --}}
                        <button type="button" class="btn btn-primary pull-right" data-toggle="modal"
                            data-target="#exampleModal" onclick="validateError();validateInput();">
                            Add Brand
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="form-body">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <h3 class="w3_inner_tittle two">Brand Form </h3>
                                            <div class="graph-form agile_info_shadow">
                                                <div id="divID"></div>
                                                <form action="" class="form" id="formData">
                                                    <div class="form-group">
                                                        <label>
                                                            <strong>Brand Name :</strong>
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <input type="brand_name" class="form-control" name="brand_name"
                                                            id="brand_name" value="{{ old('brand_name') }}"
                                                            placeholder="Enter Brand Name Here..">
                                                    </div>
                                                    <span class="text-danger" id="brand_name_error"></span>
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
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>NO.</th>
                                    <th>Category Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($brands as $brand)
                                    <tr>
                                        <td>{{ $brand->id }}</td>
                                        <td>{{ $brand->brand_name }}</td>
                                        <td>
                                            <form action="" method="post">
                                                @csrf
                                                <a class="btn btn-primary"
                                                    href="{{ route('brand_edit', ['id' => encrypt($brand->id)]) }}">Edit</a>
                                                <a class="btn btn-danger"
                                                    data-id="{{ route('brand_delete', ['brand' => encrypt($brand->id)]) }}"
                                                    onclick="deleteBrandID(event)">Delete</a>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        {{ $brands->links('pagination::bootstrap-4') }}

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>


    </script>
    <script src="{{ asset('js/admin_delete_brand.js') }}">

    </script>
    <script src="{{ asset('js/admin_add_brand.js') }}">
    </script>

@endsection
