@extends('layouts.admin')
@section('content')
<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <h1 class="app-page-title">Overview</h1>
            <div class="row gy-4">
                <form action="{{ url('Admin/Menu')}}" method="POST">
                    @csrf 
                    <div class="form-group">
                        <label for="MenuName">Tên menu</label>
                        <input name="MenuName" type="text" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="Alias">Bí danh</label>
                        <input name="Alias" type="text" class="form-control" placeholder="">
                    </div>
                        <div class="form-group">
                        <label for="Link">Liên kết</label>
                        <input name="Link" type="text" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Menu cha</label>
                        <select name="ParentID" class="form-select">
                            <option value="0" selected></option>
                            @foreach ($ParentMenus as $ParentMenu)
                            <option value="{{ $ParentMenu->MenuID }}">{{ $ParentMenu->MenuName }}</option>
                            @endforeach
                        </select>
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
@endsection