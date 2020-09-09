@extends('layout')
@section('content')
<div class="d-flex h-100 flex-column">

    <div class="d-flex justify-content-between">
        <input class="form-control" placeholder="Tìm kiếm.." />
        <form method="POST" action="/auth/sign-out">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button class="btn">Sign Out</button>
        </form>

    </div>
    <a href="/product/create">Add Product</a>
    <hr />
    @include('product.list')

</div>
@endsection