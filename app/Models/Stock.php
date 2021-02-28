<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $guarded = [
        'id'
    ];

    public static $rules = array(
        'name' => 'required',
        'fee' => 'required',
        'detail' => 'required',
        'imgpath' => 'required',
        'stock_id' => 'required',
    );

    protected $fillable = [
        'name', 'email', 'password', 'addres', 'phone', 'postcode', 'stock_id', 'user_id',
    ];

    public function orders()
    {
        return $this->belongsToMany('App\Models\Order', 'order_stock');
    }

    public function orderPrices()
    {
        return $this->belongsToMany('App\Models\Order', 'order_total_prices');
    }

    public function members()
    {
        return $this->belongsToMany('App\Models\Member', 'member__Xref_stock');
    }
}
