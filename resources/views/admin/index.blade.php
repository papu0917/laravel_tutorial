@extends('layouts.app_admin')

@section('content')
    <div class="container-fluid">
        <div class="">
            <div class="mx-auto" style="max-width:1200px">
                <h1 style="color:#555555; text-align:center; font-size:1.2em; padding:24px 0px; font-weight:bold;">商品一覧</h1>
                <div class="">
                    <div class="d-flex flex-row flex-wrap">
                        @foreach ($stocks as $stock)
                            <div class="col-xs-6 col-sm-4 col-md-4 ">
                                <div class="mycart_box">
                                    <img src="/image/{{ $stock->imgpath }}" alt="" class="incart">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $stock->name }}</h5>
                                        <p class="card-price">{{ $stock->fee }}円</p>
                                        <p class="card-text">{{ $stock->detail }}</p>
                                        <form action="mycart" method="post">
                                            @csrf
                                            <input type="hidden" name="stock_id" value="{{ $stock->id }}">
                                            <input type="submit" class="btn btn-primary" value="編集">
                                            <input type="submit" class="btn btn-primary" value="削除">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="text-center" style="width: 200px;margin: 20px auto;">
                        {{ $stocks->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
