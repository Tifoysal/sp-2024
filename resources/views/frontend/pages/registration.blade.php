@extends('frontend.master')

@section('content')

<div class="row" style="margin-top: 20px; margin-bottom:20px;">
    <div class="col-md-3">

    </div>

    <div class="col-md-6" style="border:2px solid black; padding:10px;border-radius:15px;">

        <form action="{{route('do.registration')}}" method="post">
            @csrf

            <div class="form-group">
                <label for="exampleInputEmail1">Enter Customer Name</label>
                <input name="customer_name" type="text" class="form-control" id=""  placeholder="Enter name">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input name="customer_email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
              
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input name="customer_passoword" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
           
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>

    <div class="col-md-3">

    </div>
</div>


@endsection