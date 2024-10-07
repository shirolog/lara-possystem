@extends('layout')

@section('content')
<div class="container">
        <h3 align="center" class="mt-5">Products</h3>
        <div class="row">
            <div class="col-md-2">
            </div>
            
            <div class="col-md-8">
                <div class="form-area">
                    <form method="POST" action="{{route('product.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <label>Product Name</label>
                                <input type="text" class="form-control" name="productname">
                            </div>

                            <div class="col-md-6">
                                <label>Category</label>
                                <select name="cat_id" id="cat_id" class="form-control">
                                    <option value="">Select Categoey</option>
                                    @foreach($categories as $category)
                                        @if($category->status == 1)
                                            <option value="{{$category->id}}">{{$category->catname}}</option>
                                        @endif
                                    @endforeach    
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label>Brand</label>
                                <select name="brand_id" class="form-control" id="brand_id" class="from-control">

                                    <option value="">Select Brand</option>
                                    @foreach($brands as  $brand)
                                        @if($brand->status == 1)
                                            <option value="{{$brand->id}}">{{$brand->brandname}}</option>  
                                        @endif
                                    @endforeach    
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label>Price</label>
                                <input type="text" class="form-control" name="price">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mt-3">
                                <input type="submit" class="btn btn-primary" value="Submit">
                            </div>
                        </div>
                    </form>
                </div>
            
                <table class="table mt-5">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Brand</th>
                        <th scope="col">Price</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $key => $product)
                        <tr>
                            <td scope="col">{{ ++$key }}</td>
                            <td scope="col">{{$product->productname }}</td>
                            <td scope="col">{{$product->category->catname}}</td>
                            <td scope="col">{{$product->brand->brandname}}</td>
                            <td scope="col">{{number_format($product->price)}}$</td>
                            <td scope="col">
                            <a href="{{route('product.edit', $product->id)}}">
                            <button class="btn btn-primary btn-sm">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                            </button>
                            </a>
                            
                            <form action="{{route('product.destroy', $product->id)}}" method="POST" style ="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                            onclick="return confirm('delete this record?');">Delete</button>
                            </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
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