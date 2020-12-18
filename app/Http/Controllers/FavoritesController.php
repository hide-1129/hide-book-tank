<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Favorite;

class FavoritesController extends Controller
{
    public function store(Request $request, $id) //登録機能
    {
        \Auth::user()->favorite($id);
        return back();
    }
    
    public function destroy($id) //登録削除機能
    {
        \Auth::user()->unfavorite($id);
        return back();
    }
    
    public function ranks() //ランキング機能
    {
        $user = \Auth::user();
        $favorites = Favorite::groupBy('post_id')->selectRaw('post_id, count(*) as favorites_count')->orderBy('favorites_count', 'desc')->get();
        
        $data = [
            'user' => $user,
            'favorites' => $favorites,
        ];
        
        return view('favorites.ranks', $data);
        
    }
}
