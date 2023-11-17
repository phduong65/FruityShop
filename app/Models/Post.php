<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    public function categories_post()
    {
        return $this->belongsToMany(CategoryPost::class);
    }
    public function comments()
    {
        return $this->hasMany(CommentPost::class)->latest();
    }
    protected $fillable = ['title', 'content', 'photo', 'post_status', 'post_outstand', 'comment_status', 'comment_count', 'view'];
}
