<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuMakanan extends Model
{
    protected $fillable = [
        'merchant_id', 'name', 'description', 'photo', 'price'
    ];

    public function merchant()
    {
        return $this->belongsTo(User::class, 'merchant_id');
    }
}
