@extends('site.app')

@section('tittle','Products')

@section('content')
   <h1 class="text-center" >{{$product->title}}</h1>
     <div class="product-container">
        <h4 class="my-2 p-3">{{$product->price}}</h4>

        <h4 class="my-2 p-3">{{$product->description}}</h4>
        @if ($product->is_new)
        <h4 class="my-2 p-3 alert alert-success">{{"the product is new"}}</h4>
        @else
        <h4 class="my-2 p-3 alert alert-warning">{{"the product is old"}}</h4>
        @endif
        <hr>
     </div>

@endsection
