<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
    public function comments()
    {
        return $this->hasMany(CommentProduct::class)->latest();
    }
    public function wishlists()
    {
        return $this->belongsToMany(User::class);
    }
    protected $fillable = ['name', 'price', 'photo', 'description', 'status', 'quantity', 'outstand', 'thumnail', 'discount'];

}
