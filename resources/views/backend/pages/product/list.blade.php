@extends('backend.master')

@section('content')
<h1>Product List</h1>


<a href="{{route('product.create.form')}}" class="btn btn-success">Create new product</a>


<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Category</th>
      <th scope="col">Price</th>
      <th scope="col">Stock</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

  @foreach ($products as $data )
    
  
    <tr>
      <th scope="row">{{$data->id}}</th>
      <td>{{$data->name}}</td>
      <td>{{$data->category->name}}</td>
      <td>{{$data->price}} .BDT</td>
      <td>{{$data->stock}}</td>
      <td>
        <a class="btn btn-success" href="">View</a>
        <a  class="btn btn-info" href="">Edit</a>
        <a  class="btn btn-danger" href="">Delete</a>
      </td>
    </tr>
    @endforeach

  </tbody>
</table>




@endsection
