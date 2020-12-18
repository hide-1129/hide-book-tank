<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    
    // お気に入り登録機能
    public function favorites()
    {
        return $this->belongsToMany(Post::class, 'favorite', 'user_id', 'post_id')->withTimestamps();
    }
    
    public function favorite($postId)
    {
        // 既にお気に入り登録しているかの確認
        $exist = $this->is_favorites($postId);
        
        if ($exist) {
            // 既に登録していれば何もしない
            return false;
        } else {
            // 未登録であれば登録する
            $this->favorites()->attach($postId);
            return true;
        }
    }
    
    public function unfavorite($postId)
    {
        // 既にお気に入り登録しているかの確認
        $exist = $this->is_favorites($postId);
        
        if ($exist) {
            // 既に登録していれば登録を外す
            $this->favorites()->detach($postId);
            return true;
        } else {
            // 未登録であれば何もしない
            return false;
        }
    }
    
    public function is_favorites($postId)
    {
        return $this->favorites()->where('post_id', $postId)->exists();
    }
}
