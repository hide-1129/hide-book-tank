@extends('layouts.app')

@section('content')

    @if (Auth::check())
    
        <div class="container">
            <div class="d-flex flex-row-reverse">
            
                    <div class="col-sm-3">
                        <div class="card">
                            <div class="card-header">
                                <img class="rounded img-fluid" src="{{ Gravatar::src(Auth::user()->email, 100) }}" alt="">
                            </div>
                            <div class="card-body border">
                                <div class="border-bottom">
                                    <h5> {{ Auth::user()->name }}</h5>
                                </div>
                                <div class="border-bottom">
                                    <h5>本の登録数: {{ $count_posts }}冊</h5>
                                </div>
                                <div class="border-bottom">
                                    <h5>{!! link_to_route('ranks', 'ランキング', [ 'id' => Auth::id() ]) !!}</h5>
                                </div>
                                <div class="border-bottom">
                                    <h5>{!! link_to_route('users.favorites', 'お気に入り一覧', [ 'id' => Auth::id() ]) !!}</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-9">
                        <div class="mb-2">
                            @include('webapi.search_button')
                        </div>
                        @if (count($posts) > 0)
                            @include('posts.posts', ['posts' => $posts])
                        @endif
                    </div>

            </div>
        </div>
        
    @else
        <div class="card">
            <img src="{{ asset("324154_m.jpg") }}" class="img-fluid">
            <div class="card-img-overlay text-center">
                <h1 class="text-success">ようこそ読書タンクへ</h1>
            {!! link_to_route('signup.get', 'Sign up now!', [], ['class' => 'btn btn-lg btn-primary']) !!}
            </div>
        </div>
    @endif
@endsection