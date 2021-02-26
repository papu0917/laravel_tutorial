<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Member extends Model
{
    protected $fillable = [
        'name', 'postcode', 'addres', 'phone', 'email', 'stock_id', 'total_prices',
    ];
}
