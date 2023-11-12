@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-md-10 mx-auto d-flex justify-content-center">
        @foreach($products as $product)
            @if(($product["del_flg"] === 0) && ($product["hidden_flg"]===0))
                <div class="col-md-3">
                <a class="" href="{{ route('show_product',['product' => $product['id']]) }}">
                    <div class="position-relative d-block mx-auto"><img class="d-block mx-auto" src="{{ asset('storage/'.$product['image']) }}" alt="商品画像" width="100" height="200" >
                        <div class="card-img-overlay d-flex">
                            <div class="mt-auto ms-auto">
                                <img  src="{{asset('image/likes.png')}}" alt="いいね" width="40" height="40">
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div>
                            <div>{{$product["name"]}}</div>
                            <div>{{$product["price"]}}円</div>
                        </div>
                        <div class="mt-auto ms-auto">
                            <img  src="{{asset('image/likes.png')}}" alt="いいね" width="40" height="40">
                        </div>
                    
                      </div>
                </div>
            @endif
        @endforeach
    </div>
</div>

@endsection