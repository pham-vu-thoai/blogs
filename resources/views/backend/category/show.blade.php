@extends('backend.layouts.app')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Categories
            <small>Manage categories here</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Categories</a></li>
            <li class="active">Manage</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Categories List</h3>
                <a class='col-lg-offset-5 btn btn-success' href="{{ route('category.create') }}">Add New</a>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div class="box">
                    <div class="box-header">
                        @include('includes.messages')
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Category Name</th>
                                    <th>Category Slug</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->slug }}</td>
                                    <td><a href="{{ route('category.edit',$category->id) }}"><i class="bi bi-pencil-square"></i></a></td>
                                    <td>
                                        <form id="delete-form-{{ $category->id }}" method="post" action="{{ route('category.destroy',$category->id) }}" style="display: none">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                        </form>
                                        <a href="" onclick="
                      if(confirm('Are you sure, You Want to delete this?'))
                          {
                            event.preventDefault();
                            document.getElementById('delete-form-{{ $category->id }}').submit();
                          }
                          else{
                            event.preventDefault();
                          }"><i class="bi bi-trash"></i></a></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
            <!-- /.box-body -->
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection