<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\User;

class PostsController extends Controller
{
    public function search(Request $request) //API検索機能
    {
        
        $keyword = "";
        $response = null;
        
        $url = 'https://app.rakuten.co.jp/services/api/BooksTotal/Search/20170404';
        
        $params = [
            'format' => 'json',
            'applicationId' => '1051478562906471105',
            'hits' => 10,
            'imageFlag' => 1,
        ];
        
        // 検索する！のボタンが押された場合の処理
        if ($request->filled('keyword')) {
            $keyword = $request->keyword;
            $query = http_build_query($params, "", "&");
            $search_url = $url . '?' . $query . '&keyword=' . $keyword;
            $response_json = file_get_contents($search_url);
            $response = json_decode($response_json);  // JSONデータをオブジェクトにする
            // dd($response);
        }
        
        return view('webapi.search', ['response' => $response, 'keyword' => $keyword]);
    
    }
    
    public function index() //一覧表示処理
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $posts = $user->posts()->orderBy('created_at', 'desc')->paginate(10);
            
            $data = [
                'user' => $user,
                'posts' => $posts,
            ];
            $data += $this->counts($user);
        
        }
        return view('welcome', $data);
    }
    
    public function create(Request $request) //新規登録画面表示
    {
        $smallImageUrl = $request->smallImageUrl; //検索結果のパラメーター
        $title = $request->title;
        $author = $request->author;
        $post = new Post;
        
        return view('posts.create', [
            'smallImageUrl' => $smallImageUrl, 'title' => $title, 'author' => $author, 'post' => $post, 
        ]);
    }
    
    public function store(Request $request) //新規登録処理
    {
        // dd($request); 
        $request->user()->posts()->create([
            'book_image' => $request->book_image,
            'book_title' => $request->book_title,
            'book_author' => $request->book_author,
            'review' => $request->review,
        ]);
        
        return redirect('/');
    }
    
    public function show($id) //指定したPost取得表示
    {
        $post = Post::find($id);
        
        return view('posts.show', [
           'post' => $post, 
        ]);
    }
    
    public function edit($id) //更新画面表示
    {
        $post = Post::find($id);
        
        return view('posts.edit', [
           'post' => $post, 
        ]);
    }
    
    public function update(Request $request, $id) //更新処理
    {
        $post = Post::find($id);
        
        if (\Auth::id() === $post->user_id) {
            $post->review = $request->review;
            $post->save();
        }
        
        return view('posts.show', [
           'post' => $post, 
        ]);
    }
    
    public function destroy($id) //削除処理
    {
        $post = Post::find($id);
        
        if (\Auth::id() === $post->user_id) {
            $post->delete();
        }
        
        return redirect('/');
    }
    
}
