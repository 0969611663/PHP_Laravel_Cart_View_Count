@extends('layouts.master')
@section('content')
    <div class="title m-b-md">
        Product Details
    </div>

    <div class="row">

        <!-- Kiểm tra biến $product được truyền sang từ ProductController -->
        <!-- Nếu biến $products không tồn tại thì hiển thị thông báo -->
        @if(!isset($product))
            <p class="text-danger">Không có sản phẩn nào.</p>
        @else

        <!-- Nếu biến $product tồn tại thì hiển thị sản phẩm -->
            <div class="col-12">
                <div class="card text-left" style="width: 100%;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->description }}</p>
                        <p class="card-text text-dark">${{ $product->price }}</p>
                        <p class="card-text text-danger">Số lượt xem: {{ $product->view_count }}</p>
                        <td>
                            <img src="{{ asset('storage/images/' . $product->image) }}" alt="" style="width: 650px; height: 450px; overflow: hidden ">
                        </td>
                        <br>
                        <br>
                        <!-- Nút XEM chuyển hướng người dùng quay lại trang danh sách sản phẩm -->
                        <a href="{{ route('product_index') }}" class="btn btn-primary"> Back </a>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
