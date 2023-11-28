<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','cover','avatar','name','introduce','birth','phone','address','status','is_disabled'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
