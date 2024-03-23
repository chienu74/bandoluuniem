@extends('layouts.admin')
@section('content')
<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <h1 class="app-page-title">Overview</h1>
            <div class="row gy-4">
                <form action="{{ url('Dashboard/Menu'.$menus->MenuID)}}" method="POST">
                    @csrf 
                    <input type="hidden" name="MenuID" value="{{$menus->MenuID}}" >
                    <div class="form-group">
                        <label for="MenuName">Tên menu</label>
                        <input value="{{$menus->MenuName}}" name="MenuName" type="text" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="Alias">Bí danh</label>
                        <input value="{{$menus->Alias}}" name="Alias" type="text" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="Link">Liên kết</label>
                        <input value="{{$menus->Link}}" name="Link" type="text" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Menu cha</label>
                        <select name="ParentID" class="form-select">
                            @foreach ($ParentMenus as $ParentMenu)
                                @if($ParentMenu->MenuID == $menus->ParentID)
                                    <option value="{{ $ParentMenu->MenuID }} selected">{{ $ParentMenu->MenuName }}</option>
                                @endif
                                <option value="{{ $ParentMenu->MenuID }}">{{ $ParentMenu->MenuName }}</option>
                            @endforeach
                        </select>
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
@endsection