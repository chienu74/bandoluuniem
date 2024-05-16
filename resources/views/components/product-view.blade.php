<section class="shop_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Latest Products
            </h2>
        </div>
        <div class="row">
            @foreach ($Products as $item)
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
        <div class="btn-box">
            <a href="">
                View All Products
            </a>
        </div>
    </div>
</section>
