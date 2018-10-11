@extends('layouts.master')
@section('content')
    <div class="title m-b-md">
        List Products
    </div>

    <div class="row">
        <!-- Kiểm tra biến $products được truyền sang từ ProductController -->
        <!-- Nếu biến $products không tồn tại hoặc có số lượng băng 0 (không có sản phẩm nào) thì hiển thị thông báo -->
        @if(!isset($products) || count($products) === 0)
            <p class="text-danger">Không có sản phẩn nào.</p>
        @else

        <!-- Nếu biến $products tồn tại thì hiển thị sản phẩm -->
            @foreach($products as $key => $product)
                <div class="col-4">
                    <div class="card text-left" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">SP: {{ $product->name }}</h5>
                            <p class="card-text">MT: {{ $product->description }}</p>
                            <p class="card-text text-dark">${{ $product->price }}</p>
                            <p class="card-text text-danger">Số lượt xem: {{ $product->view_count }}</p>
                            <td>
                                <img src="{{ asset('storage/images/' . $product->image) }}" alt=""
                                     style="width: 230px; height: 150px; overflow: hidden ">
                            </td>
                            <br>
                            <br>
                            <!-- Nút XEM chuyển hướng người dùng sang trang chi tiết -->
                            <a href="{{ route('show', $product->id) }}" class="btn btn-primary">See</a>
                            <a href="{{ route('cart_add', $product->id) }}" class="btn btn-primary">Add To Cart</a>
                            {{--<a href="#" id="{{ $product->id }}" class="btn btn-info delete-product">Delete</a>--}}
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
    <hr>
    <div>
        <a href="{{ route('cart') }}" class="btn btn-primary">Cart</a>
        <a href="{{ route('home') }}" class="btn btn-primary">Back</a>
    </div>
@endsection

@section('ajax')
    {{--<script>--}}
    {{--$(document).ready(function () {--}}
    {{--$('.delete-product').click(function () {--}}
    {{--var id = $(this).attr('id');--}}
    {{--$.ajax({--}}
    {{--type: "GET",--}}
    {{--url: 'http://localhost:8000/products/delete/' + id,--}}

    {{--success: function () {--}}
    {{--window.location = '/products';--}}
    {{--}--}}
    {{--})--}}
    {{--})--}}
    {{--})--}}
    {{--</script>--}}
@endsection
