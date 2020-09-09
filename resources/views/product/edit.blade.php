@extends('layout')

@section('content')
<div class="">
    <form method="POST" action={{ route('product.update',['id' => $product->id ] ) }}>
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="form-group">
            <label for="exampleInputEmail1">Tên sản phẩm</label>
            <input type="text" class="form-control" name="title" value="{{$product->title}}" ">
            <small class=" error text-danger">{{$errors->first('title')}}</small>
        </div>
        <div class="form-group">


            <label for="exampleInputPassword1">Mô tả</label>
            <input type="text" class="form-control" name="description" value="{{$product->description}}">
            <small class="error text-danger">{{$errors->first('description')}}</small>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Giá</label>
            <input type="number" class="form-control" name="price" value="{{$product->price}}">
            <small class="error text-danger">{{$errors->first('price')}}</small>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Số lượng</label>
            <input type="number" class="form-control" name="amount" value="{{$product->amount}}">
            <small class="error text-danger">{{$errors->first('amount')}}</small>
        </div>
        <button class="btn" type="submit">Update</button>
    </form>
</div>
@endsection