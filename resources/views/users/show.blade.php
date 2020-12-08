@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-end">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <img class="rounded img-fluid" src="{{ Gravatar::src(Auth::user()->email, 100) }}" alt="">
                </div>
                <div class="card-body border">
                    <div class="border-bottom">
                        <h5> {{ Auth::user()->name }}</h5>
                    </div>
                    <div class="border-bottom">
                        <h5>本の登録数: ~~冊</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-start">
        <h1>コンテンツ</h1>
    </div>
@endsection