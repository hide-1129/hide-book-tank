@extends('layouts.app')

@section('content')
    
    <div class="container">
        <div class="d-flex flex-row-reverse">
                
            <div class="card">
                <div class="card-header">
                    <img class="rounded img-fluid" src="{{ Gravatar::src(Auth::user()->email, 100) }}" alt="">
                </div>
                <div class="card-body border">
                    <div class="border-bottom">
                        <h5> {{ $user->name }}</h5>
                    </div>
                    <div class="border-bottom">
                        <h5>本の登録数: {!! $count_posts !!}冊</h5>
                    </div>
                </div>
            </div>
    
            <div class="col-sm-9">
                @if (count($posts) > 0)
                    @include('posts.posts', ['posts' => $posts])
                @endif
            </div>
    
        </div>
    </div>
    
@endsection