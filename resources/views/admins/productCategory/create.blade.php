@extends('layouts.admin')

@section('content')
<div class="app-wrapper">
	<div class="app-content pt-3 p-md-3 p-lg-4">
		<div class="container-xl">
			<h1 class="app-page-title">Loại sản phẩm</h1>
            <div class="row gy-4">
                <form action="{{ url('Admin/ProductCategory')}}" method="POST">
                    @csrf 
                    <div class="form-group">
                        <label for="ProductCategoryName">Tên loại sản phẩm</label>
                        <input name="ProductCategoryName" type="text" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="Description">Mô tả</label>
                        <input name="Description" type="text" class="form-control" placeholder="">
                    <br>
                    <button type="submit" class="btn btn-primary">Tạo mới</button><br>
                    <a href="javascript:history.back()"><-Quay lại</a>
                </form>
            </div>
        </div><!--//container-fluid-->
	</div><!--//app-content-->
</div>
@endsection