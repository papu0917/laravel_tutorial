@extends('layouts.app_guest')
@section('content')
    <div class="container">
        <h1 style="color:#555555; text-align:center; font-size:1.2em; padding:24px 0px; font-weight:bold;">お届け先を入力してください
        </h1>
        <div class="row">
            <div class="col-md-8 mx-auto">
                <form action="{{ route('guest.confirm') }}" method="post" enctype="multipart/form-data">

                    @if (count($errors) > 0)
                        <ul>
                            @foreach ($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2">氏名</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                    </div>
                    <div class="form-group row">
                        <label class="col-md-12">郵便番号</label>
                        <input type="text" class="maxlength=4" name="postcode" value="{{ old('postcode') }}">
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">住所</label>
                        <input type="text" class="form-control" name="addres" value="{{ old('addres') }}">
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">電話番号</label>
                        <input type="text" class="form-control" name="phone" value="{{ old('phone') }}">
                    </div>
                    <div class="form-group row">
                        <label class="col-md-5">メールアドレス</label>
                        <input type="text" class="form-control" name="email" value="{{ old('email') }}">
                    </div>
                    {{ csrf_field() }}
                    <div class="text-center">
                        <input type="submit" class="btn btn-primary" value="次へ">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
