@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="">
            <div class="mx-auto" style="max-width:1200px">
                <h1 class="text-center font-weight-bold" style="color:#555555;  font-size:1.2em; padding:24px 0px;">
                    {{ Auth::user()->name }}さんご購入ありがとうございました!
                </h1>

                <p class="text-center mt-5">決済画面へ進んでください。お手続き完了次第商品を発送致します。</p>
                {{-- <a href="/">商品一覧へ</a> --}}
                <p class="text-center mt-5"><a class="btn btn-primary" href="/index">決済画面へ</a></p>

            </div>
        </div>
    </div>
@endsection
