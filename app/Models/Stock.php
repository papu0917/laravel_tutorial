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

    public function orders()
    {
        return $this->belongsToMany('App\Models\Order', 'order_stock');
    }

    public function users()
    {
        return $this->belongsToMany('App\User', 'order_stock');
    }
}
