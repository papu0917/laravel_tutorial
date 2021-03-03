<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Member extends Model
{
    protected $fillable = [
        'name', 'postcode', 'addres', 'phone', 'email', 'stock_id', 'total_prices',
    ];

    public function stocks()
    {
        return $this->belongsToMany('App\Models\Stock', 'member__Xref_stock', 'user_id', 'stock_id');
    }

    public function completeOrder(Request $request)
    {
        $order = new Member;
        $order->user_id = $request->user_id;
        $order->name = $request->name;
        $order->postcode = $request->postcode;
        $order->addres = $request->addres;
        $order->phone = $request->phone;
        $order->email = $request->email;
        $order->total_prices = $request->total_prices;
        $order->save();
        $order->stocks()->attach($request->stock_id);
    }
}
