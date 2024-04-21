@extends('backend.layouts.app')

@section('content')

<div class="pagetitle">
    <h1>Create New Post</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('post') }}">Posts</a></li>
            <li class="breadcrumb-item active">Create New Post</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section create-post">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('post.store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" name="title" id="title" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="subtitle">Subtitle:</label>
                            <input type="text" name="subtitle" id="subtitle" class="form-control">
                        </div>

                        <!-- <div class="form-group">
                            <label for="slug">Slug:</label>
                            <input type="text" name="slug" id="slug" class="form-control">
                        </div> -->

                        <div class="form-group">
                            <label for="content">Body:</label>
                            <textarea class="form-control" rows="5" name="content" id="task-textarea">{{old('description')}}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="status">Status:</label>
                            <select name="status" id="status" class="form-control">
                                <option value="public">Public</option>
                                <option value="private">Private</option>
                                <option value="draft">Draft</option>
                            </select>
                        </div>

                        <!-- <div class="form-group">
                            <label for="image">Image:</label>
                            <input type="file" name="image" id="image" class="form-control">
                        </div> -->

                        <!-- <div class="form-group">
                            <label for="like">Like:</label>
                            <input type="number" name="like" id="like" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="dislike">Dislike:</label>
                            <input type="number" name="dislike" id="dislike" class="form-control">
                        </div> -->
                        <!-- <textarea class="form-control" rows="5" name="content" id="task-textarea">{{old('description')}}</textarea> -->
                        
                        <button type="submit" class="btn btn-primary">Create Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('style')
@endsection

@section('scripts')
    <script>
        


        ClassicEditor
            .create( document.querySelector( '#task-textarea' ), {
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
