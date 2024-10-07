@extends('layout')

@section('content')

<div class="container">
        <h3 align="center" class="mt-5">Category Edit</h3>
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
            <div class="form-area">
                <form method="POST" action="{{route('category.update', $category->id)}}">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <label>Category Name</label>
                            <input type="text" class="form-control" name="catname" value="{{$category->catname}}"> 
                        </div>

                        <div class="col-md-6">
                            <label>Status</label>
                            <select name="status" class="form-control">
                                <option selected>select name</option>
                                <option value="1" {{$category->status == 1 ? 'selected' : ''}}>True</option>
                                <option value="0" {{$category->status == 0 ? 'selected' : ''}}>False</option>
                            </select>
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