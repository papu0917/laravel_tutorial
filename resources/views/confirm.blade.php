@extends('layouts.app')
@section('content')

    <form action="{{ route('checkout') }}" method="POST" enctype="multipart/form-data">
        <div class="col-md-12">
            <table border=1 align="center" width="60%">
                <tr>
                    <th class="text-center">氏名</th>
                    <td class="text-center">{{ Auth::user()->name }}</td>
                    <input type="hidden" name="name" value="{{ Auth::user()->name }}">
                </tr>
                <tr>
                    <th class="text-center">郵便番号</th>
                    <td class="text-center">{{ Auth::user()->postcode }}</td>
                    <input type="hidden" name="postcode" value="{{ Auth::user()->postcode }}">
                </tr>
                <tr>
                    <th class="text-center">お届け先</th>
                    <td class="text-center">{{ Auth::user()->addres }}</td>
                    <input type="hidden" name="addres" value="{{ Auth::user()->addres }}">
                </tr>
                <tr>
                    <th class="text-center">電話番号</th>
                    <td class="text-center">{{ Auth::user()->phone }}</td>
                    <input type="hidden" name="phone" value="{{ Auth::user()->phone }}">
                </tr>
                <tr>
                    <th class="text-center">メールアドレス</th>
                    <td class="text-center">{{ Auth::user()->email }}</td>
                    <input type="hidden" name="email" value="{{ Auth::user()->email }}">
                </tr>
            </table>
        </div>
        @csrf
        <button type="submit" class="btn btn-danger btn-lg text-center buy-btn">購入して決済へ進む</button>
    </form>
@endsection
