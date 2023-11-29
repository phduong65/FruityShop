<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentProduct extends Model
{
    use HasFactory;
    public function products()
    {
        return $this->BelongsTo(Product::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    protected $fillable = ["user_id", "product_id", "content"];
}
