<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Order extends Model
{
    protected $guarded = [
        'id'
    ];

    protected $fillable = [
        'name', 'postcode', 'addres', 'phone', 'email', 'stock_id', 'total_prices',
    ];


    // TODO: バリデーションルールを別のところへ移す
    public static $rules = [
        'name' => 'required|max:255',
        'postcode' => 'required|max:8',
        'addres' => 'required',
        'phone' => 'required|max:11',
        'email' => 'required|email'
    ];

    public function stocks()
    {
        return  $this->belongsToMany('App\Models\Stock', 'order_stock', 'order_id', 'stock_id');
    }

    public function totalPrice()
    {
        return  $this->belongsToMany('App\Models\Stock', 'order_total_Prices', 'order_id', 'total_prices');
    }

    public function usersId()
    {
        return $this->belongsToMany('App\Models\Stock', 'user_stock', 'stock_id', 'user_id');
    }

    public function completeOrder(Request $request)
    {
        $order = new Order;
        $order->name = $request->name;
        $order->postcode = $request->postcode;
        $order->addres = $request->addres;
        $order->phone = $request->phone;
        $order->email = $request->email;
        $order->save();
        $order->stocks()->attach($request->stock_id);
        $order->totalPrice()->attach($request->total_prices);
    }
}
