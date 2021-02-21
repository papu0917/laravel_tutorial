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
        'name', 'postcode', 'addres', 'phone', 'email', 'stock_id', 'fee',
    ];


    // TODO: バリデーションルールを別のところへ移す
    public static $rules = [
        // 'fullname' => 'required',
        // 'fee' => 'required',
        // 'stock_name' => 'required',
        // 'phonenumber' => 'required',
        // 'streetadress' => 'required',
        // 'email' => 'required',
        // 'postalcode' => 'required',
        'name' => 'required|max:255',
        'postcode' => 'required|max:8',
        'addres' => 'required',
        'phone' => 'required|max:11',
        'email' => 'required|email'
    ];

    public function stocks()
    {
        return  $this->belongsToMany('App\\Models\Stock', 'order_stock');
    }



    public function completeOrder(Request $request): self
    {
        $order = new Order;
        $order->name = $request->name;
        $order->postcode = $request->postcode;
        $order->addres = $request->addres;
        $order->phone = $request->phone;
        $order->email = $request->email;
        $order->save();
        $order->stocks()->attach($request->stock_id);

        return $order;
    }
}
