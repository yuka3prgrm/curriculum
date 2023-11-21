@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('お届け先情報') }}</div>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-md-4 text-md-right">{{ __('氏名:') }}</div>
                            <div class="col-md-6 border-bottom">
                                <div class="">{{$address->fullname}}</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4 text-md-right">{{ __('郵便番号:') }}</div>
                            <div class="col-md-6 border-bottom">
                                <div class="">{{$address->postal_code}}</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4 text-md-right">{{ __('都道府県:') }}</div>
                            <div class="col-md-6 border-bottom">
                                <div class="">{{$address->prefecture_id}}</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4 text-md-right">{{ __('市:') }}</div>
                            <div class="col-md-6 border-bottom">
                                <div class="">{{$address->city}}</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4 text-md-right">{{ __('番地:') }}</div>
                            <div class="col-md-6 border-bottom">
                                <div class="">{{$address->house_number}}</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4 text-md-right">{{ __('建物名:') }}</div>
                            <div class="col-md-6 border-bottom">
                                <div class="">{{$address->building_name}}</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4 text-md-right">{{ __('電話番号:') }}</div>
                            <div class="col-md-6 border-bottom">
                                <div class="">{{$address->tel}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-between">
    </div>
    <form action="{{ route('address')}}" method="post">
        @csrf
        <div class="mt-4">
            <button type="submit" class="btn btn-dark">
                {{ __('　　ご注文内容確定へ　　') }}
            </button>
        </div>
    </form>
</div>

@endsection