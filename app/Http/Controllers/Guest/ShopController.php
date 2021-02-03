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
        $request->validate([
            'name' => 'required',
            'postalcode' => 'required',
            'streetaddres' => 'required',
            'phonenumber' => 'required',
            'email' => 'required',
        ]);

        $inputs = $request->all();
        $user_id = Auth::id();
        $data = $cart->showCart();

        return view('guest/confirm', $data, compact('inputs'));
    }

    public function checkout(Request $request, Cart $cart)
    {
        // dd($request);
        $user_id = Auth::id();
        $checkout_info = $cart->checkoutCart();

        // $order = new Order;
        // $order->stock_name = $request->stock_name;
        // $order->fee = $request->fee;
        // $order->name = $request->name;
        // $order->postalcode = $request->postalcode;
        // $order->streetaddres = $request->streetaddres;
        // $order->email = $request->email;
        // $order->phonenumber = $request->phonenumber;
        // $order->serialize();
        // $order->save();
        // $order->attach($request->fee);

        //　デプロイ後のエラー箇所
        // $mail_data['user'] = $user->name;
        // $mail_data['checkout_items'] = $cart->checkoutCart();
        // Mail::to($user->email)->send(new Thanks($mail_data));
        return view('guest/checkout');
    }
}
