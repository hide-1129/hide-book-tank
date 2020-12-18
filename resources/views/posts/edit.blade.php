@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="border border-dark d-flex flex-row">
            <img src="{!! $post->book_image !!}"class="img-thumbnail border-dark">
    
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
            
            {!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'put']) !!}
            
                <h3 class="text-center border-bottom border-dark">感想編集</h3>
                
                <div class="form-group mt-3 ml-4 mr-4">
                    {!! Form::label('review', '感想編集') !!}
                    {!! Form::text('review', null, ['class' => 'form-control']) !!}
                </div>
                
                {!! Form::submit('再投稿', ['class' => 'btn btn-primary']) !!}
            
            {!! Form::close() !!}
            
        </div>
        
    </div>
@endsection