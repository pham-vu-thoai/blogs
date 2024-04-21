<<<<<<< HEAD
@extends('backend.category.layout');

@section('content')
<div class="container mt-5">
    <form action="{{route('category.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="cars">Chọn category</label>
            <select class="form-control" id="cart" name="category">
                @foreach ($categories as $c)
                    <option value="{{$c->name}}">{{$c->name}}</option>
                @endforeach
            </select>
            <input type="hidden" name="hidden_category" id="hidden_category" value="">
        </div>
        <button type="submit" class="btn btn-primary">Gửi</button>
    </form>
</div>

=======
@extends('backend.layouts.app')
@section('content')
@section('style')
@endsection
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Text Editors
            <small>Advanced form element</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forms</a></li>
            <li class="active">Editors</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Titles</h3>
                    </div>
                    @include('includes.messages')
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="{{ route('category.store') }}" method="post">
                        {{ csrf_field() }}
                        <div class="box-body">
                            <div class="col-lg-offset-3 col-lg-6">
                                <div class="form-group">
                                    <label for="name">Category title</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Category Title">
                                </div>

                                <div class="form-group">
                                    <label for="slug">Category Slug</label>
                                    <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug">
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href='{{ route('category.index') }}' class="btn btn-warning">Back</a>
                                </div>

                            </div>

                        </div>

                    </form>
                </div>
                <!-- /.box -->


            </div>
            <!-- /.col-->
        </div>
        <!-- ./row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
@section('script')
>>>>>>> 3e82ed9e446a2b5c8c7e4377ef07e5c34e2a4737
@endsection