<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;

class PaymentsController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function payment(Request $request)
    {
        Stripe::setApiKey('sk_test_51I8odPJetjbJWdvb6Yw41wCOEgltvBTz1WR4DRC5l6VFx0cVWvwsHgxPR3aaVVbXux4NpSaqSnxkJvDyDiXfSOIt004leaa3wL');
        $charge = Charge::create(array(
            'amount' => 500,
            'currency' => 'jpy',
            'source' => request()->stripeToken,
        ));

        return redirect('complete');
    }

    public function complete()
    {
        return view('complete');
    }
}
