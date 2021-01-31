<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;

class PaymentsController extends Controller
{
    public function index()
    {
        return view('guest/index');
    }

    public function payment(Request $request)
    {
        Stripe::setApiKey('sk_test_51I8odPJetjbJWdvb6Yw41wCOEgltvBTz1WR4DRC5l6VFx0cVWvwsHgxPR3aaVVbXux4NpSaqSnxkJvDyDiXfSOIt004leaa3wL');
        $charge = Charge::create(array(
            'amount' => 1000,
            'currency' => 'jpy',
            'source' => request()->stripeToken,
        ));

        return redirect('guest/complete');
    }

    public function complete()
    {
        return view('guest/complete');
    }
}
