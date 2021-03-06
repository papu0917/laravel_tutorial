<?php

namespace App\Http\Controllers;

use App\Models\Stock;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $stocks = Stock::Paginate(12);
        $user_id = Auth::id();

        // $name = 'ゲスト';
        // $password = 'guestpass';

        // if (Auth::attempt(['name' => $name, 'password' => $password])) {
        //     return redirect('home');
        // }
        // if ($user_id == 2) {
        //     return view('guest/shop', compact('stocks'));
        // }
        return view('/shop', compact('stocks'));
    }
}
