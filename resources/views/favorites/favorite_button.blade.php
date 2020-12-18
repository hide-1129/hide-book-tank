@if (Auth::user()->is_favorites($post->id))
    {!! Form::open(['route' => ['unfavorite', $post->id], 'method' => 'delete']) !!}
        {!! Form::submit('お気に入り解除', ['class' => "btn btn-danger"]) !!}
    {!! Form::close() !!}
@else
    {!! Form::open(['route' => ['favorite', $post->id]]) !!}
        {!! Form::submit('お気に入り', ['class' => "btn btn-primary"]) !!}
    {!! Form::close() !!}
@endif