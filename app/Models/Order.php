<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'customer_id', 'menu_id', 'quantity', 'total_price', 'delivery_date'
    ];

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function menu()
    {
        return $this->belongsTo(MenuMakanan::class);
    }
}
