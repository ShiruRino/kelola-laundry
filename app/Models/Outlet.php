<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    protected $fillable = ['name', 'phone', 'address'];
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

}
