@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card m-auto">
                    <div class="card-header">{{ __('Product Detail') }}</div>

                        <div class="card-body">
                            <form action="{{route('index_product')}}" method="get">
                                            @csrf
                                            <button type="submit" class="btn mb-3 btn-outline-secondary">Back to Product</button>
                            </form>
                            <div class="d-flex justify-content-around align-items-center">
                                <div class="">
                                    <img src="{{url('storage/' . $product->image)}}" width="200px">
                                </div>
                                <div class="ms-3">
                                    <h1 class="card-title">{{$product->name}}</h1>
                                    <h6 class="card-subtitle mb-1">{{$product->description}}</h6>
                                    <h3>Rp{{$product->price}}</h3>
                                    <p>{{$product->stock}} left</p>
                                    <hr>
                                    @if (Auth::user()->is_admin == false)
                                    <form action="{{route('add_to_cart', $product)}}" method="post">
                                        @csrf
                                        <div class="input-group mb-3">
                                            <input type="number" class="form-control" aria-describedby="basic-addon2"
                                                name="amount" value=1>
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="submit">Add to
                                                    cart</button>
                                            </div>
                                        </div>
                                    </form>
                                    @endif

                                    @if (Auth::user()->is_admin == true)
                                        <form action="{{route('edit_product', $product)}}" method="get">
                                                @csrf
                                                <button type="submit" class="btn btn-outline-secondary">Edit Product</button>
                                        </form>
                                    @endif

                                    @if($errors->any())
                                        @foreach ($errors->all() as $error)
                                            <p>{{$error}}</p>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
