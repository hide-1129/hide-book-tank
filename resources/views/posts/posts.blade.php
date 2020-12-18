<ul class="list-unstyled">
    @foreach ($posts as $post)
        <div class="border mb-2">
        
            <img src="{!! $post->book_image !!}">
            
            <p class="mb-0">タイトル：{!! $post->book_title !!}</p>
            <p class="mb-0">著者：{!! $post->book_author !!}</p>
            
            <p>投稿者：{!! link_to_route('users.show', $post->user->name, ['id' => $post->user->id]) !!}</p>
            <div>
                {!! link_to_route('posts.show', '詳細', ['id' => $post->id]) !!}
            </div>
                
        </div>
    @endforeach
</ul>
    