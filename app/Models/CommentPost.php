<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentPost extends Model
{
    use HasFactory;
    public function posts()
    {
        return $this->BelongsTo(Post::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    protected $fillable = ["user_id", "post_id", "content"];
}
