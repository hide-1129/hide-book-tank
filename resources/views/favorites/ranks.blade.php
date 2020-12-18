@extends('layouts.app')

@section('content')
    <h3>お気に入りランキング</h3>
    @foreach ($favorites as $favorite)
    
        <div class="border mb-2">
            <div>
                <p>お気に入り数：{!! $favorite->favorites_count !!}</p>
                <img src="{!! $favorite->post->book_image !!}"
                <p class="mb-0">{!! $favorite->post->book_title !!}</p>
                <p class="mb-0">{!! $favorite->post->book_author !!}</p>
            </div>
            
            <div>
                <p>投稿者： {!! $favorite->post->user->name !!}</p>
                {!! link_to_route('posts.show', '詳細', ['id' => $favorite->post->id]) !!}
            </div>
            
        </div>
    @endforeach
@endsection