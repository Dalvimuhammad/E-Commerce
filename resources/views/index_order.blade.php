@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Orders') }}</div>

                    <div class="card-body">
                        @foreach ($orders as $order)
                            <h4>ID: {{$order->id}}</h4>
                            <p>User: {{$order->user->name}}</p>
                            <p>{{$order->created_at}}</p>
                            <p>
                                @if ($order->is_paid == true)
                                    Paid
                                @else 
                                    Unpaid
                                    @if (!Auth::user()->is_admin)
                                        <form action="{{route('show_order', $order)}}" method="get">
                                            @csrf
                                            <button type="submit" class="btn btn-primary">Payment Order</button>
                                        </form>
                                    @endif
                                    @if (Auth::user()->is_admin)
                                        @if ($order->payment_receipt)
                                        <br>
                                            <a href="{{url('storage/' . $order->payment_receipt)}}" class="btn btn-primary mb-2">
                                                Show Payment Receipt
                                            </a>
                                        @endif
                                        <div class="d-flex">
                                            <div class="me-2">
                                                <form action="{{route('confirm_payment', $order)}}" method="post">
                                                    @csrf
                                                    <button type="submit" class="btn btn-primary">Confirm</button>
                                                </form>
                                            </div>
                                            <div>
                                                <form action="{{route('delete_order', $order)}}" method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                        @endif
                                    @endif
                                    <hr>
                            </p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection