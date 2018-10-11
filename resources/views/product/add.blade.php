@extends('layouts.master')

@section('content')
    <div class="title m-b-md">
        Add New Product
    </div>
    <form class="text-left" method="post" action="{{ route('product_add') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="inputTitle">Product</label>
            <input type="text"
                   class="form-control"
                   id="inputProduct"
                   name="inputProduct"
                   required>
        </div>
        <div class="form-group">
            <label for="inputContent">Description</label>
            <textarea class="form-control"
                      id="inputDescription"
                      name="inputDescription"
                      rows="3"
                      required></textarea>
        </div>
        <div class="form-group">
            <label for="inputTitle">Price</label>
            <input type="text"
                   class="form-control"
                   id="inputPrice"
                   name="inputPrice"
                   required>
        </div>
        <div class="form-group">
            <label for="inputTitle">View Count</label>
            <input type="text"
                   class="form-control"
                   id="inputViewCount"
                   name="inputViewCount"
                   value="0"
                   required>
        </div>
        <div class="form-group">
            <label for="inputFileName">File Name</label>
            <input type="text"
                   class="form-control"
                   id="inputFileName"
                   name="inputFileName">
            <input type="file"
                   class="form-control-file"
                   id="inputFile"
                   name="inputFile">
        </div>
        <button type="submit" class="btn btn-info">Submit</button>
        <hr>
        <div>
            <a href="{{ route('home') }}" class="btn btn-info">Back</a>
        </div>
    </form>


@endsection
