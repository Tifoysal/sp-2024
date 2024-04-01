@extends('backend.master')
@section('content')
    <div class="container">
        <h1 style="font-size: 30px;">Create new Category</h1>

        <div class="mx-2 my-2">
            <form action="{{ route('category.update', $category->id) }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group mb-2">
                    <label for="">Category Name</label>
                    <input name="cat_name" type="text" class="form-control" id="" value="{{ $category->name }}"
                        placeholder="Enter Category name">
                    <div class="alert-danger" style="color: red">
                        {{ $errors->first('cat_name') }}
                    </div>
                </div>

                <div class="form-group mb-2">
                    <label for="">Description</label>
                    <textarea name="description" id="" class="form-control" placeholder="Enter description">{{ $category->description }}</textarea>
                </div>
                <div class="form-group mb-2">
                    <label for="">Upload Image</label>
                    <img style="height: 100px;width:100px" src="{{ url('uploads/category', $category->image) }}"
                        alt="">
                    <input name="image" type="file" class="form-control" id=""
                        placeholder="Enter product quantity">
                </div>
                <div class="form-group mb-2">
                    <label for="">Status</label>
                    <select class="form-select" name="status" aria-label="Default select example">
                        <option selected value="">Select Status</option>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
