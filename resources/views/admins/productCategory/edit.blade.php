@extends('layouts.admin')

@section('content')
    <div class="app-wrapper">
        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">
                 <div class="row gy-4">
                <form action="{{ url('Admin/ProductCategory/'.$ProductCategorys->ProductCategoryID) }}" method="POST">
                    @csrf 
                    @method('PUT')
                    <input type="hidden" name="ProductCategoryID" value="{{$ProductCategorys->ProductCategoryID}}" >
                    <div class="form-group">
                        <label for="ProductName">Tên danh mục sản phẩm</label>
                        <input value="{{$ProductCategorys->ProductCategoryName}}" name="ProductCategoryName" type="text" class="form-control" placeholder="">
                    </div>
                   
                    <div class="form-group">
                        <label for="Description">Mô tả</label>
                        <input value="{{$ProductCategorys->Description}}" name="Description" type="text" class="form-control" placeholder="">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Lưu lại</button><br>
                    <a href="javascript:history.back()"><-Quay lại</a>
                </form>
            </div>
            </div>
        </div>
    </div>
@endsection