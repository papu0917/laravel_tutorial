@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="">
            <div class="mx-auto" style="max-width:1200px">
                <h1 class="text-center font-weight-bold" style="color:#555555;  font-size:1.2em; padding:24px 0px;">
                    {{ Auth::user()->name }}さんご購入ありがとうございました!
                </h1>
                <p class="text-center mt-5">決済画面へ進んでください。お手続き完了次第商品を発送致します。</p>
                <form action="{{ asset('payment') }}" method="POST" class="text-center mt-5">
                    {{ csrf_field() }}
                    <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                        data-key="pk_test_51I8odPJetjbJWdvbQDr3KC6QH1jzRymuF6Vo2kFhkbvdJgFokoJmBzVcAGKlGZufTdNxlDi3r8FqL1ODURyuhpH60030D9Kwx0"
                        data-amount="1000" data-name="Stripe Demo" data-label="決済をする" data-description="これはStripeのデモです。"
                        data-image="https://stripe.com/img/documentation/checkout/marketplace.png" data-locale="auto"
                        data-currency="JPY">
                    </script>
                </form>
            </div>
        </div>
    </div>
@endsection
