@extends('layouts.app')

@section('content')

@if (isset($response) && $response->hits > 0) 

    <div class="row">
        <div class="col-12">
            <h2>{{ $keyword }}の検索結果一覧</h2>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">画像</th>
                        <th class="text-center">商品名</th>
                        <th class="text-center">著者</th>
                        <th class="text-center">登録ボタン</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($response->Items as $item)  
                        <tr>
                            <td class="text-center">
                                {{--{{ dd($item->Item->smallImageUrls) }}--}}
                                <img src='{{ $item->Item->smallImageUrl}}' />
                            </td>
                            <td class="text-center">
                                <a href="{{ $item->Item->itemUrl }}" target="_blank">
                                    {{ $item->Item->title }}
                                </a>
                            </td>
                            <td class="text-center">
                                <p>{{ $item->Item->author }}</p>
                                {{--{{ dd($item->Item->author) }}--}}
                            </td>
                            <td class="text-center">
                                {!! link_to_route('posts.create', '登録', 
                                ['smallImageUrl' => $item->Item->smallImageUrl, 'title' => $item->Item->title, 'author' => $item->Item->author], 
                                ['class' => 'btn btn-primary']) !!}
                            </td>
                        </tr>
                        
                    @endforeach
                </tbody>
            </table>
            
        </div>
    </div>

@endif

@endsection

