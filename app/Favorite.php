<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $table = 'favorite';
    
    public function post() 
    {
        return $this->belongsTo(Post::class);
    }
    
    // public function favorites()
    // {
        // post_id とfavorites_count （ランキングに使えるカウントされているもの）を利用するクエリビルダを返します
        // return $this->groupBy('post_id')->selectRaw('post_id, count(*) as favorite_count');
    // }
}
