@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card m-auto">
                    <div class="card-header">{{ __('Cart') }}</div>
                    <div class="card-body">
                            @if($errors->any())
                                @foreach ($errors->all() as $error)
                                <p>{{$error}}</p>
                                @endforeach
                            @endif

                        @php
                          $total_price=0;  
                        @endphp
                        <div class="card-group">
                            @foreach ($carts as $cart)
                                <div class="card m-3">
                                    <img src="{{url('storage/' . $cart->product->image)}}" alt="" height="200px" class="card-img-top" width="200px">
                                    <div class="card-body">
                                        <p>{{$cart->product->name}}</p>
                                        <form action="{{route('update_cart', $cart)}}" method="post">
                                            @method('patch')
                                            @csrf
                                            <div class="input-group mb-3">
                                                <input type="number" aria-describedby="basic-addon2" name="amount" class="form-control" value={{$cart->amount}}> 
                                                <div class="input-group-append">
                                                    <button type="submit" class="btn btn-outline-secondary ms-3">Update Cart</button>
                                                </div>
                                            </div>
                                        </form>
                                        <br>
                                        <form action="{{route('delete_cart', $cart)}}" method="post">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                        <br>
                                    </div>
                                </div>
                                @php
                                $total_price += $cart->product->price * $cart->amount;
                                @endphp
                            @endforeach
                        </div>
                        <p class="ms-4">Total Price: Rp.{{$total_price}}</p>
                        <div class="d-flex gap-2">
                            <div>
                                <form action="{{route('checkout')}}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-primary ms-4">Checkout</button>
                                </form>
                            </div>
                            <div>
                                <form action="{{route('index_product')}}" method="get">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-secondary">Back to Product</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
