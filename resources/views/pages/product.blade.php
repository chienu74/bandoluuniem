@extends('layouts.page')
@section('content')
<!-- shop section -->

<section class="shop_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Danh sách sản phẩm
            </h2>
        </div>
        <div class="row">
            @foreach($products as $item)
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="box">
                    <a href="{{'/ProductDetail?ProductID='.$item->ProductID}}">
                        <div class="img-box">
                            <img src="{{$item->Image}}" alt="">
                        </div>
                        <div class="detail-box">
                            <h6>
                                {{$item->ProductName}}
                            </h6>
                            <h6>
                                Price
                                <span>
                                    $200
                                </span>
                            </h6>
                        </div>
                        <div class="new">
                            <span>
                                New
                            </span>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        {{ $products->links('vendor.pagination.admin') }}
    </div>
</section>

<!-- end shop section -->
@endsection
