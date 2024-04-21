@extends('backend.layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>Posts</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Posts</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">

                    <!-- Post List -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Posts</h5>

                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Subtitle</th>
                                                <th>Status</th>
                                                <th>Posted By</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($posts as $post)
                                                <tr>
                                                    <td>{{ $post->title }}</td>
                                                    <td>{{ $post->subtitle }}</td>
                                                    <td>
                                                        @if($post->status == 0)
                                                            Public
                                                        @else
                                                            Private
                                                        @endif
                                                    </td>
                                                    <td>{{ $post->posted_by }}</td>
                                                    <td>
                                                        <a href="{{ route('post.show', $post->slug) }}" class="btn btn-primary">View</a>
                                                        <a href="{{ route('post.edit', $post->id) }}" class="btn btn-secondary">Edit</a>
                                                        <form action="{{ route('post.destroy', $post->id) }}" method="POST" style="display: inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div><!-- End Post List -->
                    <a href="{{ route('post.create') }}" class="btn btn-primary col-sm-1">Create</a>
                </div>
            </div><!-- End Left side columns -->

            <!-- Right side columns -->
            <div class="col-lg-4">
                <!-- Right side content here -->
            </div><!-- End Right side columns -->

        </div>
    </section>
@endsection
