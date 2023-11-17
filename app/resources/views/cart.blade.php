@extends('layouts.app')
@section('content')

@foreach($orders as $order)
            @if($order["status_id"] === 0)
            <div class="col mb-4">
                <div class="border border-secondary rounded">
                        <div class="">
                            <img class="d-block mx-auto" src="{{ asset('storage/'.$order['product_id']['image']) }}" alt="商品画像" width="120" height="240" >
                        </div>
                        <div class="">
                            <div class="ml-3">
                                <div class="text-dark">{{$order['product_id']["name"]}}</div>
                                <div class="text-dark">{{$order['product_id']["price"]}}円</div>
                                <div class="text-dark">{{$order['amount']}}</div>
                            </div>
                            <div class="text-right mr-3">
                                <img  src="{{asset('image/likes.png')}}" alt="いいね" width="40" height="40">
                            </div>
                        </div>

                </div>
            </div>
            @endif
        @endforeach

@endsection