@extends('layouts.admin')
@section('content')
<div class="app-wrapper">

    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">

            <h1 class="app-page-title">Overview</h1>

            <div class="row gy-4">
                <form>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên menu</label>
                        <input type="text" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Bí danh</label>
                        <input type="password" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Liên kết</label>
                        <input type="password" class="form-control" placeholder="">
                    </div>
                    <div class="form-group"><a href="javascript:history.back()">Lùi lại</a>
                        <label for="exampleInputPassword1">Menu cha</label>
                        <select name="category_id" class="form-select">
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