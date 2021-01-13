<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Stripeテスト</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <form action="{{ asset('payment') }}" method="POST" class="text-center mt-5">
        {{ csrf_field() }}
        <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
            data-key="pk_test_51I8odPJetjbJWdvbQDr3KC6QH1jzRymuF6Vo2kFhkbvdJgFokoJmBzVcAGKlGZufTdNxlDi3r8FqL1ODURyuhpH60030D9Kwx0"
            data-amount="500" data-name="Stripe Demo" data-label="決済をする" data-description="これはStripeのデモです。"
            data-image="https://stripe.com/img/documentation/checkout/marketplace.png" data-locale="auto"
            data-currency="JPY">
        </script>
    </form>
</body>

</html>
