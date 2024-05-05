


@extends('frontend.master')

@section('content')
      <!-- end header inner -->
      <!-- end header -->
      <div class="blue_bg">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>All Products</h2>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- project section -->
      <div id="project" class="project">
         <div class="container">
         
          
            <div class="row">
            <div class="product_main">
             
            @foreach ($collection as $object)
            <div class="project_box ">
                     <div class="dark_white_bg" ><img  src="images/shoes1.png" alt="#"/></div>
                     <h3>{{$object->name}}</h3>
                     <h2>BDT {{$object->price}}</h2>
                  </div>
            @endforeach
                  
            
              
               <div class="col-md-12">
                  <a class="read_more" href="#">See More</a>
               </div>
            </div>
            </div>
         </div>
      </div>
      <!-- end project section -->
      <!--  footer -->
     

@endsection