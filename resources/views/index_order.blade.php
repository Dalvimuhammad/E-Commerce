@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Orders') }}</div>

                    <div class="card-body">
                        @foreach ($orders as $order)
                            <p>ID: {{$order->id}}</p>
                            <p>User: {{$order->user->name}}</p>
                            <p>{{$order->created_at}}</p>
                            <p>
                                @if ($order->is_paid == true)
                                    Paid
                                @else 
                                    Unpaid
                                    @if ($order->payment_receipt)
                                    <a href="{{url('storage/' . $order->payment_receipt)}}">
                                        Show Payment Receipt
                                    </a>
                                    @endif
                                    <form action="{{route('confirm_payment', $order)}}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Confirm</button>
                                    </form>
                                @endif
                            </p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection