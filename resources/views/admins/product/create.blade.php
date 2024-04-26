@extends('layouts.admin')
@section('content')


<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <h1 class="app-page-title">Overview</h1>
            <div class="row gy-4">
                <form action="{{ url('Admin/Product')}}" method="POST" enctype="multipart/form-data">
                    @csrf 
                    <div class="form-group">
                        <label for="ProductName">Tên sản phẩm</label>
                        <input name="ProductName" type="text" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Loại sản phẩm</label>
                        <select name="ProductCategoryID" class="form-select">
                            @foreach ($CategoryProducts as $CategoryProduct)
                            <option value="{{ $CategoryProduct->ProductCategoryID }}">{{ $CategoryProduct->ProductCategoryName }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Description">Mô tả</label>
                        <input name="Description" type="text" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="Price">Giá</label>
                        <input name="Price" type="text" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="Image"></label>
                        <input class="note-image-input form-control-file note-form-control note-input" 
                        type="file" name="Image" accept="image/*" multiple="multiple">
                    </div>
                    <div class="form-group">
                        <label for="Detail"></label>
                        <textarea name="Detail" id="summernote"></textarea>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Tạo mới</button><br>
                    <a href="javascript:history.back()"><-Quay lại</a>
                </form>
            </div>
        </div><!--//container-fluid-->
    </div><!--//app-content-->
    @include('admins.partials.footer')
</div><!--//app-wrapper-->

<script>
    $('#summernote').summernote({
        height: 300,
        minHeight: null,
        maxHeight: null,
        focus: true
    });
</script>
@endsection