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


    <div class="row row-cols-4 mr-5 ml-5">
        @foreach($products as $product)
            @if(($product["del_flg"] === 0) && ($product["hidden_flg"]===0))
            <div class="col mb-4">
                <div class="border border-secondary rounded">
                    <a class="" href="{{ route('show_product',['product' => $product['id']]) }}">
                        <div class="position-relative d-block mx-auto">
                            <img class="d-block mx-auto" src="{{ asset('storage/'.$product['image']) }}" alt="商品画像" width="120" height="240" >
                        </div>
                        <div class="">
                            <div class="ml-3">
                                <div class="text-dark">{{$product["name"]}}</div>
                                <div class="text-dark">{{$product["price"]}}円</div>
                            </div>
                            <div class="text-right mr-3">
                                <img  src="{{asset('image/likes.png')}}" alt="いいね" width="40" height="40">
                            </div>
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
