@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Order Detail') }}</div>
                    @php
                        $total_price = 0;
                    @endphp
                        <div class="card-body">
                            <h5 class="card-title">Order ID: {{$order->id}}</h5>    
                            <h6 class="card-subtitle mb-2 text-muted"> User: {{$order->user->name}}</h6>
                            <hr>
                            @foreach ($order->transactions as $transaction)
                                <h6>Product: {{$transaction->product->name}} - {{$transaction->amount}} pcs || Rp.
                                {{$transaction->product->price * $transaction->amount}}   </h6>
                                @php
                                    $total_price += $transaction->product->price * $transaction->amount
                                @endphp
                            @endforeach
                            <hr>

                            <p>Total: Rp{{ $total_price }}</p>
                            @if ($order->is_paid == false && $order->payment_receipt == null && !Auth::user()->is_admin)
                            <form action="{{ route('submit_payment_receipt', $order) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Upload your payment receipt</label>
                                    <input type="file" name="payment_receipt" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-primary mt-3">Submit payment</button>
                            </form>
                        @endif
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection
