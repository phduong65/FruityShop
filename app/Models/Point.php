<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// app/Models/Point.php

class Point extends Model
{
    protected $fillable = ['user_id', 'points'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
