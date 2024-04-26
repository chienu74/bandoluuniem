@extends('layouts.admin')
@section('content')
<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <h1 class="app-page-title">Overview</h1>
            <div class="row gy-4">
                <form action="{{ url('Admin/Product/'.$Products->ProductID) }}" method="POST" enctype="multipart/form-data">
                    @csrf 
                    @method('PUT')
                    <input type="hidden" name="ProductID" value="{{$Products->ProductID}}" >
                    <div class="form-group">
                        <label for="ProductName">Tên sản phẩm</label>
                        <input value="{{$Products->ProductName}}" name="ProductName" type="text" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="ProductCategoryID">Loại sản phẩm</label>
                        <select name="ProductCategoryID" class="form-select">
                            <option value="0">-----</option>
                            @foreach ($CategoryProducts as $ProductCategory)
                                @if($ProductCategory->ProductCategoryID == $Products->ProductCategoryID)selected
                                    <option value="{{ $ProductCategory->ProductCategoryID }}" selected>{{ $ProductCategory->ProductCategoryName }}</option>
                                @else
                                <option value="{{ $ProductCategory->ProductCategoryID }}">{{ $ProductCategory->ProductCategoryName }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                        <div class="form-group">
                        <label for="Description">Mô tả</label>
                        <input value="{{$Products->Description}}" name="Description" type="text" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="Price">Giá</label>
                        <input value="{{$Products->Price}}" name="Price" type="text" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="Image">Image</label>
                        <img width="100px" src="{{ url($Products->Image)}}" alt="Hình ảnh">
                        <input value="{{$Products->Image}}" type="text" name="Image" hidden>
                        <input value="{{$Products->Image}}" 
                        class="" 
                        type="file" name="Image" />
                    </div>
                     <div class="form-group">
                        <label for="Detail"></label>
                        <textarea name="Detail" id="summernote">{{$Products->Detail}}</textarea>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Lưu lại</button><br>
                    <a href="javascript:history.back()"><-Quay lại</a>
                </form>
            </div>
        </div><!--//container-fluid-->
    </div><!--//app-content-->

    @include('admins.partials.footer')

</div><!--//app-wrapper-->



 <script>
   $('#summernote').summernote({
  height: 300,                 // set editor height
  minHeight: null,             // set minimum height of editor
  maxHeight: null,             // set maximum height of editor
  focus: true                  // set focus to editable area after initializing summernote
});
  </script>
@endsection