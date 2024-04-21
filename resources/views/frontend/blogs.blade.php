@extends('frontend.layouts.app')
@section('content')

<div class="container">
	    <div class="row" id="app">
	        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
	            @foreach($posts as $post)
	                <div class="post-preview">
	                    <a href="{{ route('user.post', $post->slug) }}">
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

@endsection
@section('script')
@endsection