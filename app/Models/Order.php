<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public function isUsed()
    {
        return $this->orders()->exists();
    }

    // Quan hệ với bảng orders
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
