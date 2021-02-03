<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [
        'id'
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

    public function orders()
    {
        return $this->hasMany('App\Models\Order');
    }
}
