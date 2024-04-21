@extends('frontend.layouts.app')

@section('content')

<!-- Nội dung bài viết -->
    <style>
        .content img{
            display: block; /* Đảm bảo ảnh là một khối hiển thị */
    margin-left: auto; /* Đẩy ảnh về bên trái */
    margin-right: auto; /* Đẩy ảnh về bên phải */
        max-width: 700px;
        height: auto;
        }
    </style>
<article>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                
                <small>Create at : {{ $post->created_at }}</small><br>
                <small>Posted by : {{ $author->name}}</small><br>
                <small> Title : {{$post->title}}</small>
                @foreach ($post->categories as $category)
                <small class="pull-right" style="margin-right: 20px">
                   Loại bài viết : <a href="{{ route('category',$category->slug) }}">{{ $category->name }}</a>
                </small>
                @endforeach
                {!! htmlspecialchars_decode($post->body) !!}

                {{-- Hiển thị số lượng like và dislike --}}
                <div>
                    <span id="likeCount">{{ $post->like }}</span> Thích
                    <span id="dislikeCount">{{ $post->dislike}}</span> Không thích
                </div>
                <!-- Đoạn mã HTML để hiển thị nút like -->
                <button id="likeButton" data-post-id="{{ $post->id }}" data-liked="{{ $post->likes->contains('user_id', Auth::id()) ? 'true' : 'false' }}">
                    @if ($post->likes->contains('user_id', Auth::id()))
                    Unlike
                    @else
                    Like
                    @endif
                </button>
                <!-- Nút dislike -->
                <button id="dislikeButton" data-post-id="{{ $post->id }}" data-liked="{{ $post->dislikes->contains('user_id', Auth::id()) ? 'true' : 'false' }}">
                    @if ($post->dislikes->contains('user_id', Auth::id()))
                    Undislike
                    @else
                    Dislike
                    @endif
                </button>

              
                {{-- Mây thẻ --}}
                <h3>Tag</h3>
                @foreach ($post->tags as $tag)
                <a href="{{ route('tag',$tag->slug) }}">
                    <small class="pull-left" style="margin-right: 20px;border-radius: 5px;border: 1px solid gray;padding: 5px;">
                        {{ $tag->name }}
                    </small>
                </a>
                @endforeach
            </div>
            <div class="fb-comments" data-href="{{ Request::url() }}" data-numposts="5"></div>
        </div>
    </div>
</article>

@endsection

@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var likeButton = document.getElementById('likeButton');
        var likeCount = document.getElementById('likeCount');
        var postId = likeButton.getAttribute('data-post-id');

        likeButton.addEventListener('click', function() {
            var formData = new FormData();
            formData.append('_token', '{{ csrf_token() }}');
            formData.append('id', postId);

            fetch('{{ route("posts.save-like") }}', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.text())
                .then(data => {
                    if (data === 'deleted') {
                        likeButton.innerText = 'Like';
                        likeCount.innerText = parseInt(likeCount.innerText) - 1;
                    } else {
                        likeButton.innerText = 'Unlike';
                        likeCount.innerText = parseInt(likeCount.innerText) + 1;
                    }
                })
                .catch(error => console.error('Error:', error));
        });
    });
    document.addEventListener('DOMContentLoaded', function() {
        var likeButton = document.getElementById('dislikeButton');
        var likeCount = document.getElementById('dislikeCount');
        var postId = likeButton.getAttribute('data-post-id');

        likeButton.addEventListener('click', function() {
            var formData = new FormData();
            formData.append('_token', '{{ csrf_token() }}');
            formData.append('id', postId);

            fetch('{{ route("posts.save-dislike") }}', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.text())
                .then(data => {
                    if (data === 'deleted') {
                        likeButton.innerText = 'disLike';
                        likeCount.innerText = parseInt(likeCount.innerText) - 1;
                    } else {
                        likeButton.innerText = 'Undislike';
                        likeCount.innerText = parseInt(likeCount.innerText) + 1;
                    }
                })
                .catch(error => console.error('Error:', error));
        });
    });
    
</script>

@endsection