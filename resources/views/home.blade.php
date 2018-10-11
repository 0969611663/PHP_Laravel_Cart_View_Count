@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="title m-b-md">
                    Sử dụng Session đếm số lượng lượt xem
                </div>

                <div class="links">
                    <a href="{{ route('product_index') }}">Danh sách sản phẩm</a>
                </div>
                <br>
                <div class="links">
                    <a href="{{ route('product_create') }}">Tạo mới sản phẩm</a>
                </div>
            </div>
        </div>
@endsection
