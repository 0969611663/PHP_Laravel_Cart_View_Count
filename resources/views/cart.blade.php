@extends('layouts.master')
@section('content')

    <div class="title m-b-md">
        Product Details
    </div>

    <div class="row">

        <!-- Kiểm tra biến $product được truyền sang từ ProductController -->
        <!-- Nếu biến $products không tồn tại thì hiển thị thông báo -->
        @if(!isset($products))
            <p class="text-danger">Không có sản phẩn nào.</p>
        @else

        <!-- Nếu biến $product tồn tại thì hiển thị sản phẩm -->
            <div class="col-12">
                <div class="card text-left" style="width: 100%;">
                    <div class="card-body">

                        <p class="card-text">{{ $products }}</p>
                        <p class="card-text text-dark">${{ $productId }}</p>
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
