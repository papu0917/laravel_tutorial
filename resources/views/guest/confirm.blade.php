@extends('layouts.app_guest')

@section('content')
    <div class="container-fluid">
        <div class="">
            <div class="mx-auto" style="max-width:1200px">
                <h1 class="text-center font-weight-bold" style="color:#555555;  font-size:1.2em; padding:24px 0px;">
                    お届け先
                </h1>
                <form action="{{ route('guest.checkout') }}" method="POST" enctype="multipart/form-data">
                    <div class="col-md-12">
                        <table border=1 align="center" width="60%">
                            <tr>
                                <th class="text-center">氏名</th>
                                <td class="text-center">{{ $inputs['name'] }}</td>
                                <input type="hidden" name="name" value="{{ $inputs['name'] }}">
                            </tr>
                            <tr>
                                <th class="text-center">郵便番号</th>
                                <td class="text-center">{{ $inputs['postcode'] }}</td>
                                <input type="hidden" name="postcode" value="{{ $inputs['postcode'] }}">
                            </tr>
                            <tr>
                                <th class="text-center">お届け先</th>
                                <td class="text-center">{{ $inputs['addres'] }}</td>
                                <input type="hidden" name="addres" value="{{ $inputs['addres'] }}">
                            </tr>
                            <tr>
                                <th class="text-center">電話番号</th>
                                <td class="text-center">{{ $inputs['phone'] }}</td>
                                <input type="hidden" name="phone" value="{{ $inputs['phone'] }}">
                            </tr>
                            <tr>
                                <th class="text-center">メールアドレス</th>
                                <td class="text-center">{{ $inputs['email'] }}</td>
                                <input type="hidden" name="email" value="{{ $inputs['email'] }}">
                            </tr>
                        </table>
                    </div>
                    <h1 class="text-center font-weight-bold" style="color:#555555;  font-size:1.2em; padding:24px 0px;">
                        ご注文内容
                    </h1>
                    <div class="col-md-12">
                        <div class="row">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th width="50%">商品名</th>
                                        <th>金額</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($my_carts as $my_cart)
                                        <tr>
                                            <th>{{ $my_cart->stock->name }}</th>
                                            <th>{{ number_format($my_cart->stock->fee) }}円</th>
                                            <input type="hidden" name="stock_id[]" value="{{ $my_cart->stock->id }}">
                                            {{-- <input type="hidden" name="fee"
                                                value="{{ $my_cart->stock->fee }}"> --}}
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="text-center p-2">
                        個数：{{ $count }}個<br>
                        <p style="font-size:1.2em; font-weight:bold;">合計金額:{{ number_format($sum) }}円</p>
                    </div>
                    @csrf
                    <button type="submit" class="btn btn-danger btn-lg text-center buy-btn">購入して決済へ進む</button>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
