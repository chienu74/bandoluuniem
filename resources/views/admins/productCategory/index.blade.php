@extends('layouts.admin')

@section('content')
<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <h1 class="app-page-title">Overview</h1>
            <a href="{{url('Admin/ProductCategory/create')}}">Tạo mới danh mục sản phẩm</a>
            <div class="tab-content" id="orders-table-tab-content">
                <div class="tab-pane fade active show" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                    <div class="app-card app-card-orders-table shadow-sm mb-5">
                        <div class="app-card-body">
                            <div class="table-responsive">
                                <table class="table app-table-hover mb-0 text-left">
                                    <thead>
                                        <tr>
                                            <th class="cell">#</th>
                                            <th class="cell">Tên danh mục sản phẩm</th>
                                            <th class="cell">Mô tả</th>
                                            <th class="cell"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $i=1;
                                        @endphp
                                        @foreach ($ProductCategorys as $ProductCategory)
                                        <tr>
                                            <td class="cell">{{ $i }}</td>
                                            @php
                                            $i++;
                                            @endphp
                                            <td class="cell">{{ $ProductCategory->ProductCategoryName }}</td>
                                            <td class="cell">{{ $ProductCategory->Description }}</td>
                                            <td class="cell">
                                                <a class="btn btn-primary" href="{{ url('/Admin/ProductCategory/'.$ProductCategory->ProductCategoryID).'/edit'}}">Sửa</a>
                                                <form action="{{ url('Admin/ProductCategory/'.$ProductCategory->ProductCategoryID)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger" href="{{ url('/Admin/ProductCategory'.'/'.$ProductCategory->ProductCategoryID)}}" onclick="return confirm('Xác nhận xóa')">
                                                        Xóa
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!--//table-responsive-->
                        </div>
                        <!--//app-card-body-->
                    </div>
                    <!--//app-card-->
                    {{-- {{$ProductCategorys->links('vendor.pagination.default')}} --}}
                </div>
                <!--//tab-pane-->
            </div>
        </div>
        <!--//container-fluid-->
    </div>
    <!--//app-content-->
</div>
@endsection
