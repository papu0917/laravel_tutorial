<?php

namespace App\Http\Controllers\Guest;

use App\Models\Stock;
use App\Models\Order;
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

    public function confirm(Request $request, Cart $cart)
    {
        // phone,postcodeのハイフンをどう使うか考え中
        $request->validate([
            'name' => 'required|max:255',
            'postcode' => 'required|max:8',
            'addres' => 'required',
            'phone' => 'required|max:11',
            'email' => 'required|email',
        ]);

        $inputs = $request->all();
        $user_id = Auth::id();
        $data = $cart->showCart();

        return view('guest/confirm', $data, compact('inputs'));
    }

    public function checkout(Request $request, Cart $cart, Order $order)
    {
        // confirmのバリデーションと同じなので処理を共通化したい。
        $request->validate([
            'name' => 'required|max:255',
            'postcode' => 'required|max:8',
            'addres' => 'required',
            'phone' => 'required|max:11',
            'email' => 'required|email',
        ]);

        $completeOrder = $order->completeOrder($request);
        $checkout_info = $cart->checkoutCart();

        //　デプロイ後のエラー箇所
        // $mail_data['user'] = $user->name;
        // $mail_data['checkout_items'] = $cart->checkoutCart();
        // Mail::to($user->email)->send(new Thanks($mail_data));
        return view('guest/checkout');
    }
}
