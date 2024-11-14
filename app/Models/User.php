<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'contact', 'address', 'role'
    ];

    protected $hidden = [
        'password',
    ];

    public function menus()
    {
        return $this->hasMany(MenuMakanan::class, 'merchant_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'customer_id');
    }
}
