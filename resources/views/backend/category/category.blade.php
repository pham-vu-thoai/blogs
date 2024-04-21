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

@endsection