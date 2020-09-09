@extends('layout')

@section('content')
<div class="">
    <form method="POST" action={{ route('product.store') }}>
        {{ csrf_field() }}
        <div class="form-group">
            <label for="exampleInputEmail1">Tên sản phẩm</label>
            <input type="text" class="form-control" name="title">
            <small class="error text-danger">{{$errors->first('title')}}</small>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Mô tả</label>
            <input type="text" class="form-control" name="description">
            <small class="error text-danger">{{$errors->first('description')}}</small>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Giá</label>
            <input type="number" class="form-control" name="price">
            <small class="error text-danger">{{$errors->first('price')}}</small>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Số lượng</label>
            <input type="number" class="form-control" name="amount">
            <small class="error text-danger">{{$errors->first('amount')}}</small>
        </div>
        <button class="btn" type="submit">Create</button>
    </form>
</div>
@endsection