<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'user_id', 'customer_id', 'outlet_id', 'product_id', 'status', 'total_price'
    ];
}
