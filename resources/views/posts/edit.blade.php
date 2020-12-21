@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="border border-dark d-flex flex-row mb-2">
            <img src="{!! $post->book_image !!}"class="img-thumbnail border-dark ml-1 mt-1 mb-1">
    
            <table class="table">
                <tr>
                    <th>タイトル: {!! $post->book_title !!}</th>
                </tr>
                <tr>
                    <th>著者: {!! $post->book_author !!}</th>
                </tr>
            </table>
        </div> 
        
        <h3 class="text-center border-bottom border-dark">感想編集</h3>
        
        <div class="border border-success mb-2">
            
            {!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'put']) !!}
                
                <div class="form-group mt-3 ml-4 mr-4">
                    {!! Form::label('review', '編集') !!}
                    {!! Form::text('review', null, ['class' => 'form-control']) !!}
                </div>
                
                {!! Form::submit('再投稿', ['class' => 'btn btn-primary ml-4 mb-2']) !!}
            
            {!! Form::close() !!}
            
        </div>
        
    </div>
@endsection