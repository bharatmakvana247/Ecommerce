@extends('admin.layouts.master')
@section('content')

    <!-- /inner_content-->
    <div class="inner_content">
        <!-- /inner_content_w3_agile_info-->

        <div class="buttons_w3ls_agile">
            <div class="inner_content_w3_agile_info two_in">

                <div class="agile-tables">
                    <div class="w3l-table-info agile_info_shadow">
                        <h3 class="w3_inner_tittle two"><strong> Brand </strong></h3>
                        <!-- tables -->
                        {{-- Button Add Product --}}
                        <button type="button" class="btn btn-primary pull-right" data-toggle="modal"
                            data-target="#exampleModal" onclick="validateError();validateInput();">
                            Add Category
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="form-body">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <h3 class="w3_inner_tittle two">Category Form </h3>
                                            <div class="graph-form agile_info_shadow">
                                                <div id="divID"></div>
                                                <form action="" class="form" id="formData">
                                                    <div class="form-group">
                                                        <label>
                                                            <strong>Category Name :</strong>
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <input type="category_name" class="form-control"
                                                            name="category_name" id="category_name"
                                                            placeholder="Enter Category Name Here..">
                                                    </div>
                                                    <span class="text-danger" id="category_name_error"></span>
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
                            @if (session()->has('message'))
                                <div class="alert alert-success" style="padding: 5px">
                                    {{ session()->get('message') }}
                                </div>
                            @endif
                            <thead>
                                <tr>
                                    <th>NO.</th>
                                    <th>Category Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->category_name }}</td>
                                        <td>
                                            <a href="{{ route('category_edit', ['category' => encrypt($category->id)]) }}"
                                                class="btn btn-success">Edit</a>
                                            <a data-id="{{ route('category_delete', ['category' => encrypt($category->id)]) }}"
                                                class="btn btn-danger" onclick="deleteCategoryID(event)">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $categories->links('pagination::bootstrap-4') }}
                    </div>
                </div>
                <!-- //tables -->
            </div>
            <!-- //inner_content_w3_agile_info-->
        </div>
        <!-- //inner_content-->
        <script src="{{ asset('js/admin_delete_category.js') }}"></script>
        <script src="{{ asset('js/admin_add_category.js') }}"></script>
    @endsection
