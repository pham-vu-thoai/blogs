@extends('user.app')

@section('bg-img', Storage::disk('local')->url($post->image))
@section('title', $post->title)
@section('sub-heading', $post->subtitle)

@section('head')
    <link rel="stylesheet" href="{{ asset('public/user/css/prism.css') }}">
    <style>
        .content img{
            display: block; /* Đảm bảo ảnh là một khối hiển thị */
    margin-left: auto; /* Đẩy ảnh về bên trái */
    margin-right: auto; /* Đẩy ảnh về bên phải */
        max-width: 700px;
        height: auto;
        }
    </style>
@endsection

@section('main-content')
    <!-- Post Content -->
    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 content">
                    @if ($post)
                        <h2 class="post-title">{{ $post->title }}</h2>
	                    <h3 class="post-subtitle">{{ $post->subtitle }}</h3>
                        <small>Created at {{ $post->created_at }}</small>
                        @if ($post->categories && $post->categories->count() > 0)
                            @foreach ($post->categories as $category)
                                <small class="pull-right" style="margin-right: 20px">
                                    <a href="{{ route('category', $category->slug) }}">{{ $category->name }}</a>
                                </small>
                            @endforeach
                        @endif
                        {!! htmlspecialchars_decode($post->body) !!}

                        {{-- Tag clouds --}}
                        <h3>Tag Clouds</h3>
                        @if ($post->tags && $post->tags->count() > 0)
                            @foreach ($post->tags as $tag)
                                <a href="{{ route('tag', $tag->slug) }}">
                                    <small class="pull-left" style="margin-right: 20px;border-radius: 5px;border: 1px solid gray;padding: 5px;">
                                        {{ $tag->name }}
                                    </small>
                                </a>
                            @endforeach
                        @endif
                    @else
                        <p>No post found.</p>
                    @endif
                </div>
                <div class="fb-comments" data-href="{{ Request::url() }}" data-numposts="5"></div>
            </div>
        </div>
    </article>

    <hr>
@endsection

@section('footer')
    <script src="{{ asset('user/js/prism.js') }}"></script>
@endsection
