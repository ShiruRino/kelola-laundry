<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'user_id', 'customer_id', 'outlet_id', 'product_id', 'status', 'done_at', 'picked_up', 'vat_fee', 'late_fee', 'total_price',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function customer(){
        return $this->belongsTo(Customer::class);
    }
    public function outlet(){
        return $this->belongsTo(Outlet::class);
    }
    public function product(){
        return $this->belongsTo(Product::class);
    }
}
