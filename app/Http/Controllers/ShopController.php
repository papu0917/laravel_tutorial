<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\Thanks;

class ShopController extends Controller
{
    public function index()
    {
        $stocks = Stock::Paginate(12);
        return view('shop', compact('stocks'));
    }

    public function myCart(Cart $cart)
    {
        // $user_id = Auth::id();
        $data = $cart->showCart();
        return view('mycart', $data);
    }

    public function addMycart(Request $request, Cart $cart)
    {
        $stock_id = $request->stock_id;
        $message = $cart->addCart($stock_id);
        $data = $cart->showCart();

        return view('mycart', $data)->with('message', $message);
    }

    public function deleteCart(Request $request, Cart $cart)
    {
        $stock_id = $request->stock_id;
        $message = $cart->deleteCart($stock_id);
        $data = $cart->showCart();

        return view('mycart', $data)->with('message', $message);
    }

    public function checkout(Request $request, Cart $cart)
    {
        $user = Auth::user();
        //　デプロイ後のエラー箇所
        // $mail_data['user'] = $user->name;
        // $mail_data['checkout_items'] = $cart->checkoutCart();
        // Mail::to($user->email)->send(new Thanks($mail_data));
        // return view('checkout');
    }
}
