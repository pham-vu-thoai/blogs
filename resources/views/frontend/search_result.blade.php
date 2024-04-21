@extends('frontend.layouts.app')
@section('content')


<!-- ======= Search Results ======= -->
<section id="search-result" class="search-result">
  <div class="container">
    <div class="row">
      <div class="col-md-9">
        <h3 class="category-title">Search Results</h3>

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

      <div class="col-md-3">
        <!-- ======= Sidebar ======= -->
        <!-- Sidebar content here -->
      </div>

    </div>
  </div>
</section> <!-- End Search Result -->

@endsection
@section('script')
@endsection