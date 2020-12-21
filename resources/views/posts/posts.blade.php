<ul class="list-unstyled">
    @foreach ($posts as $post)
        <div class="border border-success mb-2">
        
            <p><img src="{!! $post->book_image !!}" class="mt-2 ml-2 mb-2"></p>
            
            <span class="ml-2 mb-1" id="title">タイトル：</span>
            <span class="border-bottom">{!! $post->book_title !!}</span>
            
            <br>
            
            <span class="ml-2 mb-1" id="author">著者：</span>
            <span class="border-bottom">{!! $post->book_author !!}</span>
            
            <p class="ml-2">投稿者：{!! link_to_route('users.show', $post->user->name, ['id' => $post->user->id]) !!}</p>
            
            <div class="ml-2">
                {!! link_to_route('posts.show', '詳細', ['id' => $post->id]) !!}
            </div>
                
        </div>
    @endforeach
</ul>
    