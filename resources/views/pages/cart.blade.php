@extends('layouts.page')
@section('content')
<div class="container container-bg">
    <div class="row">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Ảnh</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Giá</th>
                </tr>
            </thead>
            <tbody>
                @php
                $i=1;
                @endphp
                @foreach ($productDetails as $item)
                <tr>
                    <td>{{$i}}</td>@php $i++; @endphp
                    <td><a href="ProductDetail?ProductID={{$item->ProductID}}"><img style="width: 100px" src="{{$item->Image}}" alt=""></a></td>

                    <td>{{$item->Quantity}}</td>
                    <td>{{$item->Price}}</td>
                </tr>
                @endforeach
                <tr>
                    <td>Tổng tiền:</td>
                    <td></td>
                    <td></td>
                    <td>{{$tien}}</td>
                </tr>
            </tbody>
        </table>
        @if (isset($login))
        <a href="/Order">
            <button type="button" class="btn btn-primary">
                Đặt hàng
            </button>
        </a>
        @endif

    </div>
</div>
<br>


@endsection
