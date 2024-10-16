@extends('site.app')

@section('tittle','Products')

@section('content')
   <h1 class="text-center" > {{'Products page!'}}</h1>
   <a href="{{route('products.create')}}">create</a>
   @if(session()->has('success'))
   <div class="alert alert-success">{{session('success')}}</div>
   @endif
  @foreach ($products as $product)

     <div class="product-container">
        <h1 class="my-2 p-3"> {{$product->title}} </h1>
        <h4 class="my-2 p-3"> {{$product->price}} </h1>
        <h4 class="my-2 p-3">{{$product->description}}</h4>
        @if ($product->is_new)
        <h4 class="my-2 p-3 alert alert-success">{{"the product is new"}}</h4>
        @else
        <h4 class="my-2 p-3 alert alert-warning">{{"the product is old"}}</h4>
        @endif
        <a href="{{route('products.show',$product->id)}}">show</a>
        <form action="{{route('products.destroy', $product->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <input type="hidden" name="id" >
            <button type="submit">delete</button>
        </form>
        <hr>
     </div>

  @endforeach

@endsection
