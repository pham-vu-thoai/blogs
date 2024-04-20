@extends('user/app')

@section('bg-img',asset('public/user/img/home-bg.jpg'))
@section('title','Bitfumes Blog')
@section('sub-heading','Learn Together and Grow Together')
@section('head')
<meta name="csrf-token" content="{{ csrf_token() }}">
	<style>
		.fa-thumbs-up:hover{
			color:#f41115;
		}
	</style>
@endsection
@section('main-content')
	<!-- Main Content -->
	<div class="container">
	    <div class="row" id="app">
	        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
	            @foreach($posts as $post)
	                <div class="post-preview">
	                    <a href="{{ route('user.post', $post->id) }}">
	                        <h2 class="post-title">{{ $post->title }}</h2>
	                        <h3 class="post-subtitle">{{ $post->subtitle }}</h3>
	                    </a>
	                    <p class="post-meta">
	                        Posted by
	                        <a href="#!">{{ $post->author }}</a>
	                        on {{ $post->created_at }}
	                    </p>
	                </div>
	                <hr>
	            @endforeach
	            <!-- Pager -->
	            <ul class="pager">
	                <li class="next">
	                	{{ $posts->links() }}
	                </li>
	            </ul>
	        </div>
	    </div>
	</div>
	<hr>
@endsection
@section('footer')
	<script src="{{ asset('/public/js/app.js') }}"></script>
@endsection
