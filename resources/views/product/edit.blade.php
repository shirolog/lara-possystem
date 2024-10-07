@extends('layout')

@section('content')

<div class="container">
        <h3 align="center" class="mt-5">product Update</h3>
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
            <div class="form-area">
                <form method="POST" action="{{route('product.update', $product->id)}}">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <label>product Name</label>
                            <input type="text" class="form-control" name="productname" value="{{$product->productname}}"> 
                        </div>

                        <div class="col-md-6">
                                <label>Category</label>
                                <select name="cat_id" id="cat_id" class="form-control">
                                    @foreach($categories as $category)
                                       @if($category->status == 1)
                                            <option value="{{$category->id}}" @if($category->id == $product->cat_id) selected  @endif >{{$category->catname}}</option>
                                        @endif
                                    @endforeach    
                                </select>
                        </div>

                        <div class="col-md-6">
                            <label>Brand</label>
                            <select name="brand_id" class="form-control" id="brand_id" class="from-control">
                                @foreach($brands as $brand)
                                    @if($brand->status == 1)
                                        <option value="{{$brand->id}}" @if($brand->id == $product->brand_id) selected  @endif >{{$brand->brandname}}</option>
                                    @endif
                                @endforeach   
                            </select>
                        </div>

                        
                        <div class="col-md-6">
                            <label>Price</label>
                            <input type="text" class="form-control" name="price" value="{{$product->price}}">
                        </div>
                    </div>
          
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <input type="submit" class="btn btn-primary" value="Update">
                        </div>
                    </div>
                </form>
 
        </div>
    </div>

@endsection

@push('css')
    <style>
        .form-area{
            padding: 20px;
            margin-top: 20px;
            background-color:#ffff00;
        }


    </style>
@endpush