@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <img id="pic" src="{{asset('image/advertisement1.png')}}" alt="広告" height="300px" width="810px" >
            <script>
            var pics_src = new Array('image/advertisement1.png',"image/advertisement2.png","image/advertisement3.png");
            var num = -1;

            slideshow_timer();

            function slideshow_timer(){
                if (num == 2){
                    num = 0;
                } 
                else {
                    num ++;
                }
                document.getElementById("pic").src=pics_src[num];
                setTimeout("slideshow_timer()",5000); 
            }
            </script>
        </div>
    </div>
    <div class="h4 ml-5 mt-4 mb-4">新着商品</div>


    <div class="row  row-cols-4 mr-5 ml-5 row-eq-height mb-5">
        @foreach($products as $product)
            @if(($product["del_flg"] === 0) && ($product["hidden_flg"]===0))
                <div class="col mb-4 ">
                    <div class="bg-white shadow p-3  bg-body-tertiary rounded h-100 position-relative ">
                        <a class="" href="{{ route('show_product',['product' => $product['id']]) }}">
                            <div class="mx-auto" style="max-width: 120px;">
                                <img class="card-img d-block mx-auto" src="{{ asset('storage/'.$product['image']) }}" alt="商品画像" width="120" height="240" >
                                @if($product->orders->sum('amount') > $product->stock) 
                                <img class=" mt-3 card-img-overlay mx-auto" src="{{ asset('image/soldout.png') }}" alt="商品画像" width="160" height="240" >
                                @endif
                            </div>
                            <div class="mb-4">
                                <div class="text-dark">{{$product["name"]}}</div>
                                <div class="text-dark">{{$product["price"]}}円</div>
                            </div>
                            <div class="position-absolute" style="bottom: 0; right: 0;">
                            @if(Auth::check())
                                @if($like_model->like_exist(Auth::user()->id,$product->id))
                                    <p class="favorite-marke mr-3">
                                        <a class="js-like-toggle liked h1" data-productid="{{ $product->id }}" >
                                            ❤
                                            <!-- <img src="{{asset('image/liked.png')}}" alt="Liked" width="40" height="40"> -->
                                        </a>
                                    </p>
                                @else
                                <p class="favorite-marke mr-3">
                                    <a class="js-like-toggle unliked h1" data-productid="{{ $product->id }}">
                                        ❤
                                        <!-- <img src="{{asset('image/likes.png')}}" alt="Like" width="40" height="40"> -->
                                    </a>
                                </p>
                                @endif
                            @endif
                            </div>
                        </a>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
<div>
    <div class="text-right"><a class="" href="{{ route('search_product')}}">▶▶商品をもっと見る</a></div>
</div>
</div>
@endsection
