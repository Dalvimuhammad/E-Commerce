@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Products') }}</div>
                        <div class="card-group m-auto">
                            @foreach ($products as $product)
                                <div class="card m-3" style="width:14rem">
                                    <img class="card-img-top" src="{{url('storage/' . $product->image)}}" alt="" height="200px">
                                    <div class="card-body">
                                    <p class="card-text">{{$product->name}}</p>
                                        <form action="{{route('show_product', $product)}}" method="get">
                                            @csrf
                                            <button type="submit" class="btn btn-primary">Show Detail</button>
                                        </form>
                                        <br>
                                        @if (Auth::user()->is_admin == true)
                                        <form action="{{route('delete_product', $product)}}" method="post">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Delete Product</button>
                                        </form>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection