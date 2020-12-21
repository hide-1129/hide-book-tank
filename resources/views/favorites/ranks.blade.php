@extends('layouts.app')

@section('content')
    <h2 id="favorite" class="border text-center">お気に入りランキング</h2>
    
    @foreach ($favorites as $favorite)
    
        <div class="border border-success mb-2">
            
            <h4 class="ml-2">お気に入り数：{!! $favorite->favorites_count !!}</h4>
            
            <p><img src="{!! $favorite->post->book_image !!}" class="mt-2 ml-2 mb-2"></p>
            
            <span class="ml-2 mb-1" id="title">タイトル：</span>
            <span class="border-bottom">{!! $favorite->post->book_title !!}</span>
            
            <br>
            
            <span class="ml-2 mb-1" id="author">著者：</span>
            <span class="border-bottom">{!! $favorite->post->book_author !!}</span>
            
            <p class="ml-2">投稿者：{!! $favorite->post->user->name !!}</p>
            
            <div class="ml-2">
                {!! link_to_route('posts.show', '詳細', ['id' => $favorite->post->id]) !!}
            </div>
        </div>
    @endforeach
@endsection