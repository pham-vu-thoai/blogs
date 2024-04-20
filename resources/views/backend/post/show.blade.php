@extends('backend.layouts.app')
@section('css')
<style>
    /* Định dạng cho tiêu đề */
h1.title {
    font-size: 50px;
    font-weight: bold;
    text-transform: uppercase;
}

/* Định dạng cho phụ đề */
h2.subtitle {
    text-transform: uppercase;
    font-size: 32px;
    font-weight: normal;
}

/* Định dạng cho tên tác giả */
.author {
    font-size: 18px;
    font-style: italic;
}

/* Định dạng cho nội dung */
.content {
    font-size: 16px;
    line-height: 1.6;
}
</style>
@endsection
@section('content')
<section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">
    <div class="post col-12">
    <h1 class="title">{{ $post->title }}</h1>
        @if($post->subtitle)
        <h2 class="subtitle">{{ $post->subtitle }}</h2>
        <p class="author">Tác giả: {{ $post->posted_by }}</p>
        @endif
        <div class="content">{!! $post->body !!}</div>
        <p>Status: {{ $post->status == 0 ? 'Public' : 'Private' }}</p>
        <!-- Hiển thị thêm thông tin khác của bài post nếu cần -->
    </div>
    </div>

                            </div>
                        </div>
@endsection