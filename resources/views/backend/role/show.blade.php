@extends('backend.layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Roles</h3>
        <a class='col-lg-offset-5 btn btn-success' href="{{ route('role.create') }}">Add New</a>
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
                      <h3 class="box-title">Data Table With Full Features</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>S.No</th>
                          <th>Role Name</th>
                          <th>Edit</th>
                          <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($roles as $role)
                          <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $role->name }}</td>
                              <td><a href="{{ route('role.edit',$role->id) }}"><i class="bi bi-pencil-square"></i></a></td>
                              <td>
                                <form id="delete-form-{{ $role->id }}" method="post" action="{{ route('role.destroy',$role->id) }}" style="display: none">
                                  {{ csrf_field() }}
                                  {{ method_field('DELETE') }}
                                </form>
                                <a href="" onclick="
                                if(confirm('Are you sure, You Want to delete this?'))
                                    {
                                      event.preventDefault();
                                      document.getElementById('delete-form-{{ $role->id }}').submit();
                                    }
                                    else{
                                      event.preventDefault();
                                    }" ><i class="bi bi-trash"></i></a>
                              </td>
                            </tr>
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

@section('script')
@endsection