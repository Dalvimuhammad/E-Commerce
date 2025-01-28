@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
                </div>
            
            <div class="card">
                <div class="card-header">{{__('Product')}}</div>
                    <div class="card-body d-flex justify-content-around align-items-center">
                        <div>
                            <img src="{{asset('image/new-product.png')}}" alt="" height="100px">
                        </div>
                        <div>
                            <form action="{{route('index_product', )}}" method="get">
                                @csrf
                                <button type="submit" class="btn btn-primary">Show Product</button>
                            </form>
                        </div>
                    </div>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
