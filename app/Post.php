<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user_id', 'book_image', 'book_title', 'book_author', 'review',    
    ];
    
    public function user() 
    {
        return $this->belongsTo(User::class);
    }
    
    // お気に入り登録機能
    public function favorite_users()
    {
        return $this->belongsToMany(User::class, 'favorite', 'post_id', 'user_id')->withTimestamps();
    }
}
