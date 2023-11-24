@extends('layouts.app')
@section('content')
<?php
$subtotal=0;
foreach($orders as $order){
     $subtotal = $subtotal + (($order->product->price)*($order["amount"]));
}
?>
<div class="container">
    <div class="h4">
        {{"注文一覧"}}
    </div>
    <div class="d-flex justify-content-end">
        <div class="mr-5 h2 d-flex align-items-center">売上合計
            <div>
                {{$subtotal}}
            </div>円
        </div>
    </div>
<table class='table'>
    <tr>
        <th scope='col'>注文ID</th>
        <th scope='col'>商品名</th>
        <th scope='col'>料金</th>
        <th scope='col'>個数</th>
        <th scope='col'>購入日</th>
        <th scope='col'>購入者</th>
    </tr>
    @foreach($orders as $order)
        <tr>
            <td scope="col">{{$order["id"]}}</td>
            <td scope="col">{{$order->product["name"]}}</td>
            <td scope="col">{{$order->product["price"]}}円</td>
            <td scope="col">{{$order["amount"]}}</td>
            <td scope="col">{{$order["updated_at"]}}</td>
            <td scope="col">{{$order->user["name"]}}</td>
        </tr>
    @endforeach
</table>
<div class="d-flex justify-content-center">{{ $orders->links() }}</div>
<div class="text-right mr-5"><a class="ml-3" href="{{ route('ownerpage')}}"><button type="submit" class="btn btn-dark">管理者ページへ戻る</button></a></div>
</div>

@endsection