@extends('layouts.app')

@section('content')
    
    <h2 id="favorite" class="border text-center">お気に入り一覧</h2>
    
    @foreach ($posts as $post)
        @include('posts.posts', ['posts' => $posts])
    @endforeach
    
@endsection