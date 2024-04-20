@extends('backend.layouts.app')

@section('content')
<div class="pagetitle">
    <h1>Edit Post</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('post') }}">Posts</a></li>
            <li class="breadcrumb-item active">Edit Post</li>
        </ol>
    </nav>
</div>
<section class="section create-post">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

        <h5>Edit Post</h5>
        <form action="{{ route('post.update', $post->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $post->title }}" required>
            </div>

            <div class="form-group">
                <label for="subtitle">Subtitle:</label>
                <input type="text" name="subtitle" id="subtitle" class="form-control" value="{{ $post->subtitle }}">
            </div>

            <div class="form-group">
                <label for="content">Content:</label>
                <textarea class="form-control" rows="5" name="content" id="content" required>{{ $post->body }}</textarea>
            </div>

            <div class="form-group">
                <label for="status">Status:</label>
                <select name="status" id="status" class="form-control">
                    <option value="public" {{ $post->status === 0 ? 'selected' : '' }}>Public</option>
                    <option value="private" {{ $post->status === 1 ? 'selected' : '' }}>Private</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update Post</button>
        </form>
        </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('scripts')
    <script>
        


        ClassicEditor
            .create( document.querySelector( '#content' ), {
                ckfinder:{
                    uploadUrl: "{!! route('post.upload') !!}?_token={{ csrf_token() }}"
                }
    } )
    .then(editor =>{
                console.log(editor);
            })
            .catch( error => {
                console.error( error );
            } 
            
        );
        // CKEDITOR.replace('task-textarea',{
        //     filebrowserUploadUrl:"{!! route('post.upload') !!}?_token={{ csrf_token() }}",
        //     filebrowserUploadMethod:'form'
        // });
        
    </script>
@endsection