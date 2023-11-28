<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;
    protected $table ='vouchers';
    protected $fillable = [
        'code',
        'discount_percentage',
        'is_active',
        'expires_at',
        'usage_limit',
        'min_order_value',
        'quantity'
    ];

    public function users(){
        return $this->belongsToMany(User::class,'voucher_user');
    }
    public function firstWithExperyDate($name, $userId)
    {
        return $this->whereName($name)->whereDoesntHave('users', fn($q) => $q->where('users.id', $userId))
        ->whereDate('expires_at', '>=', Carbon::now())->first();
    }

}
