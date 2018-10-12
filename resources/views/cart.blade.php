@extends('layouts.cartshop')
@section('content')
    <div class="col-12">
        <div class="row">
            <div class="title">
                <h1>Product Details</h1>
            </div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Product</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Image</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @if(!Session::has('cart'))
                    <tr>
                        <td colspan="4">Không có sản phẩn nào</td>
                    </tr>
                @else
                    <?php $stt = 0 ?>
                    @foreach(Session::get('cart') as $key => $item)
                        <?php $stt++ ?>
                        <tr>
                            <td>{{ $stt }}</td>
                            <td>{{ $item['name'] }}</td>
                            <td>${{ $item['price'] }}</td>
                            <td>{{ $item['quantity'] }}</td>
                            <td>
                                <img src="{{ asset('storage/images/' . $item['image']) }}" alt=""
                                     style="width: 100px; height: 100px; overflow: hidden ">
                            </td>
                            <td>
                                <a href="{{ route('delete_product', $item['id']) }}"  class="btn btn-info delete-task">Delete</a>
                            </td>
                        </tr>


                    @endforeach
                @endif
                </tbody>
            </table>
            <div>
                <a href="{{ route('product_index') }}" class="btn btn-info">BACK</a>
            </div>
        </div>
    </div>
@endsection
