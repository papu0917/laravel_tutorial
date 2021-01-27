<?php

namespace App\Http\Controllers\Auth;

use App\Models\Stock;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function guestLogin()
    {
        $name = 'ゲスト';
        $password = 'guestpass';

        if (Auth::attempt(['name' => $name, 'password' => $password])) {
            return redirect('guest/shop');
        }
        return redirect('/');
    }

    public function shop()
    {
        $stocks = Stock::Paginate(12);
        return view('shop', compact('stocks'));
    }
}
