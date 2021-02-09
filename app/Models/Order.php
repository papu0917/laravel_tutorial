<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [
        'id'
    ];

    protected $fillable = [
        'name', 'postcode', 'addres', 'phone', 'email', 'stock_id'
    ];



    public static $rules = [
        'fullname' => 'required',
        'fee' => 'required',
        'stock_name' => 'required',
        'phonenumber' => 'required',
        'streetadress' => 'required',
        'email' => 'required',
        'postalcode' => 'required',
    ];

    public function stocks()
    {
        return  $this->belongsToMany('App\\Models\Stock', 'order_stock');
    }
}
