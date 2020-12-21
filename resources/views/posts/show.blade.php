@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="border border-dark d-flex flex-row mb-2">
            <img src="{!! $post->book_image !!}" class="img-thumbnail border-dark ml-1 mt-1 mb-1">
    
            <table class="table">
                <tr>
                    <th>タイトル: {!! $post->book_title !!}</th>
                </tr>
                <tr>
                    <th>著者: {!! $post->book_author !!}</th>
                </tr>
            </table>
        </div> 
        
        <h3 class="text-center border-bottom border-dark">感想</h3>
        
        <div class="border border-success mb-2">
            <p class="mt-1 mb-2">{!! $post->review !!}</p>
        </div>
        
        <span id="post-show-button" class="mr-2">  {{-- id="post-show-button"　ボタンを横並びにする --}}
            @include('favorites.favorite_button')
        </span>
        @if (Auth::id() == $post->user_id)
        
            <span id="post-show-button" class="mr-2">
                {!! link_to_route('posts.edit', '編集', ['id' => $post->id]) !!}
            </span>
            <span id="post-show-button">
                {!! Form::model($post, ['route' => ['posts.destroy', $post->id], 'method' => 'delete']) !!}
                    {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
            </span>
        @endif
        
        
    </div>
@endsection