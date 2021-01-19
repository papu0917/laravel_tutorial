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
    );
}
