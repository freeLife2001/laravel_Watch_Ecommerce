@extends('layouts.shop')

@section('content')
    <!-- Main charts -->
    <!-- Main Slider -->

    <section class="product-details-area">
        <div class="container">
            <div class="row">
                @include('layouts.flash_message')
                <div class="col-md-4 col-sm-4">
                    <div class="product-details-col">
                        <div id="myCarousel" class="carousel slide my-product-carousel" data-ride="carousel">
                            <!-- Wrapper for slides -->
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img src="{{asset($product['avatar'])}}" alt="">
                                </div><!-- End Item -->
                            </div><!-- End Carousel Inner -->

                        </div><!-- End Carousel -->
                    </div>
                </div>
                <div class="col-md-8 col-sm-8">
                    <div class="product-details-col">
                        <h3>{{$product['name']}}</h3>
                        <div class="review">
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star-o" aria-hidden="true"></i>
                            <a href="#">(12)</a>
                        </div>
                        <h2>{{number_format($product['price_discount'])}} vnđ
                            <del> {{number_format($product['price'])}} vnđ</del>
                        </h2>
                        <p>Mã sp:TH-{{$product['id']}}</p>
                        <p>
                            <i class="glyphicon glyphicon-list"></i> Danh mục:
                            @if($category_list)
                                @foreach($category_list as $item)
                                    <a href="{{route('home.product_category',['id'=>$item['id'],'slug'=>str_slug($item['name'])])}}">{{$item['name']}}</a>
                                @endforeach
                            @endif
                        </p>
                        <p class="hide">
                            <i class="glyphicon glyphicon-tags"></i> Tag:
                            @if($tag_list)
                                @foreach($tag_list as $item)
                                    <a href="{{route('home.product_tag',$item['id'])}}">{{$item['name']}}</a>
                                @endforeach
                            @endif
                        </p>
                        <p>Mã sp:TH-{{$product['id']}}</p>
                        <p class="warning">Đã bán: {{$product['sold']}} sản phẩm</p>
                        <p class="warning">Chỉ còn: {{$product['total']-$product['sold']}} sản phẩm</p>
                        <div>
                            {!! $product['contents']!!}
                        </div>
                        <div class="product-action">
                            <form action="{{route('cart.create')}}" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="product_id" value="{{$product['id']}}">
                                <button type="submit"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i>Thêm vào
                                    giỏ
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('layouts.separator')
@endsection
