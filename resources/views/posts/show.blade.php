@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="border border-dark d-flex flex-row">
            <img src="{!! $post->book_image !!}" class="img-thumbnail border-dark">
    
            <table class="table">
                <tr>
                    <th>タイトル: {!! $post->book_title !!}</th>
                </tr>
                <tr>
                    <th>著者: {!! $post->book_author !!}</th>
                </tr>
            </table>
        </div> 
        
        <div class="border border-dark">
            <h3 class="text-center border-bottom border-dark">感想</h3>
        
            <p class="mb-0">{!! $post->review !!}</p>
        </div>
        
        @include('favorites.favorite_button')
        
        @if (Auth::id() == $post->user_id)
            {!! link_to_route('posts.edit', '編集', ['id' => $post->id]) !!}
            
            {!! Form::model($post, ['route' => ['posts.destroy', $post->id], 'method' => 'delete']) !!}
                {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        @endif
    </div>
@endsection