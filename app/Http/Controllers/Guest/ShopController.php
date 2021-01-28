<?php

namespace App\Http\Controllers\Guest;

use App\Models\Stock;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\Thanks;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $stocks = Stock::Paginate(12);
        return view('guest/shop', compact('stocks'));
    }

    public function myCart(Cart $cart)
    {

        $user_id = Auth::id();
        $data = $cart->showCart();

        return view('guest/mycart', $data);
    }

    public function addMycart(Request $request, Cart $cart)
    {
        $user_id = Auth::id();
        $stock_id = $request->stock_id;
        $message = $cart->addCart($stock_id);
        $data = $cart->showCart();


        return view('guest/mycart', $data)->with('message', $message);
    }

    public function deleteCart(Request $request, Cart $cart)
    {
        $user_id = Auth::id();
        $stock_id = $request->stock_id;
        $message = $cart->deleteCart($stock_id);
        $data = $cart->showCart();


        return view('guest/mycart', $data)->with('message', $message);
    }

    public function contact()
    {
        return view('guest/contact');
    }

    public function checkout(Request $request, Cart $cart)
    {
        $user_id = Auth::id();

        $checkout_info = $cart->checkoutCart();
        //　デプロイ後のエラー箇所
        // $mail_data['user'] = $user->name;
        // $mail_data['checkout_items'] = $cart->checkoutCart();
        // Mail::to($user->email)->send(new Thanks($mail_data));
        return view('guest/checkout');
    }
}