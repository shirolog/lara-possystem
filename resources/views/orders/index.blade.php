@extends('layout')

@section('content')
<div class="container">
<div class="col-lg-12">
            @if(Session::has('success'))
            <div class="alert alert-success mt-1" style="font-size: 30px; text-align:center;">
                <p>{{Session::get('success')}}</p>
            </div>
            @endif
        </div>

        <h3 align="center" class="mt-5">Orders</h3>
        <div class="row">
            <div class="col-md-2">
            </div>
            
            <div class="col-md-8">

                <form action="{{route('order.store')}}" method="post">
                    @csrf
                        <table class="table mt-5">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Category</th>
                                <th scope="col">Brand</th>
                                <th scope="col">Price</th>
                                <th scope="col">Qty</th>
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
                                    <td scope="col"><input type="number"  name="qty[]" style="width: 50px;" min="0" value="0"></td>
                                </tr>
                                <input type="hidden" name="productname[]" value="{{$product->productname}}">
                                <input type="hidden" name="product_id[]" value="{{$product->id }}">
                                <input type="hidden" name="price[]" value="{{$product->price}}">
                                @endforeach
                            </tbody>
                        </table>
                            <button type="submit" class="btn btn-info text-white btn-lg"
                            style=" display:block; margin:auto;">Order</button>
                </form>
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