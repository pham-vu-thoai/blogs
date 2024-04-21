@extends('backend.category.layout');

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                         <h3>category</h3>
                    </div>
                    <div class="col-md-6">
                         <a href="{{route('category.index')}}" class="btn btn-primary float-end">qua trang chọn category</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @if (Session::has('thongbao'))
                    <div class="alert alert-success">
                        {{Session::get('thongbao')}}
                    </div>
                @endif

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>title</th>
                            <th>name_category</th>
                            <th>image</th>
                            <th>like</th>
                            <th>dislike</th>
                            <th>status</th>
                            <th>create_at</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $p)
                            <tr>
                                
                                <td>{{$p->id}}</td>
                                <td>{{$p->title}}</td>
                                <td>{{$p->name}}</td>
                                <td>{{$p->like}}</td>
                                <td>{{$p->dislike}}</td>
                                <td>{{$p->status}}</td>
                                <td>{{$p->created_at}}</td>
                                <td>
                                    <form action="" method="POST">
                                        <a href="" class="btn btn-info">Sửa</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">xóa</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection