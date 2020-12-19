@extends('layouts.app')

@section('content')

    @include('commons.navbar')

    <div class="col-sm-10 offset-sm-1"> 
        <div class="border border-dark">
            
            {!! Form::model($post, ['route' => 'posts.store']) !!}
            
                <div class="row mt-4 ml-2 mr-2">
                    <div class="container">
                        <div class="d-flex flex-row">
                            <img src="{{ $smallImageUrl }}" class="img-thumbnail border-dark">
                            {!! Form::hidden('book_image', $smallImageUrl) !!}  
                            
                            <table class="table table-bordered">
                                <tr>
                                    <th>タイトル</th>
                                    <td>{{ $title }}</td>
                                    {!! Form::hidden('book_title', $title) !!}
                                </tr>
                                
                                <tr>
                                    <th>著者</th>
                                    <td>{{ $author }}</td>
                                    {!! Form::hidden('book_author', $author) !!}
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>   
            
                <div class="form-group mt-3 ml-4 mr-4">
                    {!! Form::label('review', '感想') !!}
                    {!! Form::text('review', null, ['class' => 'form-control']) !!}
                </div>
                
                {!! Form::submit('投稿', ['class' => 'btn btn-primary']) !!}
            
            {!! Form::close() !!}
        </div>
    </div>
    
@endsection