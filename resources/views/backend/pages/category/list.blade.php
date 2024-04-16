@extends('backend.master')

@section('content')
    <h1>Category List</h1>


    <a href="{{ route('category.form') }}" class="btn btn-success">Create new category</a>


    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Category Image</th>
                <th scope="col">Category Name</th>
                <th scope="col">Category Status</th>
                {{-- <th scope="col">Description</th> --}}
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($categories as $data)
                {{-- @dd($data) --}}

                <tr>
                    <th scope="row">{{ $data->id }}</th>
                    <td><img style="width: 100px;height:100px" src="{{ url('uploads/category', $data->image) }}"
                            alt="" srcset=""></td>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->status }}</td>
                    {{-- <td>{{ $data->description }}</td> --}}
                    <td>
                        <a class="btn btn-info" href="{{ route('category.edit', $data->id) }}">Edit</a>
                        <a class="btn btn-success" href="">View</a>
                        <a class="btn btn-danger" href="">Delete</a>
                    </td>
                </tr>
            @endforeach


        </tbody>

    </table>

    {{ $categories->links() }}
@endsection
