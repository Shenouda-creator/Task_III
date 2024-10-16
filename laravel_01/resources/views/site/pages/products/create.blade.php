@extends('site.app')

@section('tittle', 'Products')

@section('content')
    <h1 class="text-center">Create</h1>
    <div class="container ">

        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="alert alert-danger">{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        @if(session()->has('success'))
        <div class="alert alert-success">{{session('success')}}</div>
        @endif

        <form class="form-control my-5 border-dark" action="{{ route('products.store') }}" method="POST">
            @csrf
            <div class="form-group ">
                <label for="inputtitle">Title</label>
                <input type="text" class="form-control mt-1" id="title" name="title" placeholder="Title" value="{{old('title')}}">
                @error('title')
                    <li class="text text-danger">{{ $message }}</li>
                @enderror
            </div>
            <div class="form-group">
                <label for="inputprice">Price</label>
                <input type="number" class="form-control mt-1" id="price" name="price" placeholder="Price"  value="{{old('price')}}">
                @error('price')
                    <li class="text text-danger">{{ $message }}</li>
                @enderror
            </div>
            <div class="form-group ">
                <label for="inputdescription">Description</label>
                <textarea name="description" class="form-control border-dark" id="description" cols="20" rows="5">{{old('description')}}</textarea>
                @error('description')
                    <li class="text text-danger">{{ $message }}</li>
                @enderror

            </div>
            <button type="submit" class="btn btn-primary my-3">Submit</button>
        </form>
    </div>


@endsection
