@extends('layouts.shop')

@section('content')
    <!-- Main charts -->
    <!-- Main Slider -->
    @include('layouts.slider')

    <!-- Product Carousel -->
    <section class="product-carousel-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h2>Sản Phẩm <span>Mới</span></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="product-carousel-col">
                        <div class="product-carousel">
                            @if(!empty($new))
                                @foreach($new as $item)
                                    <div class="item">
                                        <a href="{{route('home.view',['id' => $item->id,'slug'=> str_slug($item->name)])}}">
                                            <img src="{{asset($item->avatar)}}" class="img-responsive center-block"
                                                 alt="">
                                        </a>
                                        <h4 class="text-center">
                                            <p>{{number_format($item->price)}}vnđ</p>
                                        </h4>
                                    </div>
                                @endforeach
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Discount Start -->
    <section class="discount-section">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <div class="discount-col">
                        <h2>Sản phẩm giảm giá <span>(lên đến 50%)</span></h2>
                    </div>
                </div>
            </div>
            <div class="row">

                @if(!empty($discount_big))
                    <div class="col-md-6 col-sm-12">
                        <div class="discount-col">
                            <a href="{{route('home.view',['id'=>$item->id,'slug'=>str_slug($item->name)])}}"><img
                                        src="{{asset($discount_big->avatar)}}" alt=""></a>
                            <div class="discounted-price">
                                <p><span>{{number_format($discount_big->price)}} vnđ</span>
                                    (còn {{number_format($discount_big->price_discount)}} vnđ) </p>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="col-md-6 col-sm-12">
                    <div class="row">
                        @if(!empty($discount))
                            @foreach($discount as $item)
                                <div class="col-md-6 col-sm-6">
                                    <div class="discount-col">
                                        <a href="{{route('home.view',['id'=>$item->id,'slug'=>str_slug($item->name)])}}"><img
                                                    src="{{asset($item->avatar)}}" alt=""></a>
                                        <div class="discounted-price">
                                            <p><span>{{number_format($item->price)}} vnđ</span>
                                                (còn {{number_format($item->price_discount)}} vnđ) </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Men's Shopping Start -->
    <section class="men-shopping">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h2>Sản Phẩm <span>Bán Chạy</span></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @if(!empty($best_sell))
                    @foreach($best_sell as $item)
                        <div class="col-md-3 col-sm-6 col-xs-6 full-wd-600">
                            <div class="shopping-col">
                                <div class="product-img">
                                    <a href="{{route('home.view',['id'=>$item->id,'slug'=>str_slug($item->name)])}}"><img
                                                src="{{asset($item->avatar)}}" alt=""></a>
                                    <div class="product-over-box">
                                        <form action="{{route('cart.create')}}" method="post">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="product_id" value="{{$item->id}}">
                                            <button type="submit"><i class="fa fa-cart-arrow-down"
                                                                     aria-hidden="true"></i>Thêm vào giỏ
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                <div class="product-info text-center">
                                    <h4>
                                        <a href="{{route('home.view',['id'=>$item->id,'slug'=>str_slug($item->name)])}}">{{$item->name}}</a>
                                    </h4>
                                    <p>{{number_format($item->price)}} vnđ</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
    <!-- Blog Start -->
    <section class="blog-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h2>THÔNG TIN <span>HỮU ÍCH</span></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @if(!empty($posts))
                    @foreach($posts as $item)
                        <div class="col-md-4 col-sm-4">
                            <div class="blog-col">
                                <div class="blog-img">
                                    <img src="{{asset($item->avatar)}}" alt="{{$item->name}}">
                                    <div class="date">
                                        <p>{{date('d/m/Y H:i:s',strtotime($item->created_at))}}</p>
                                    </div>
                                    <div class="overlay-top"></div>
                                    <div class="blog-info-box">
                                        <ul>
                                            <li><i class="fa fa-user" aria-hidden="true"></i> <a
                                                        href="javascript:void(0)">{{$item->user_create}}</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <h3><a href="{{route('post.view',$item->id)}}">{{$item->name}}</a></h3>
                                {!!$item->summary  !!}
                            </div>
                        </div>
                    @endforeach
                @endif

            </div>
        </div>
    </section>

    <!-- Separator Start -->
    @include('layouts.separator')

    {{--<!-- Partner Start -->--}}
    {{--<section class="partner-area">--}}
    {{--<div class="container">--}}
    {{--<div class="row">--}}
    {{--@if(!empty($tag_list))--}}
    {{--@foreach($tag_list as $item)--}}
    {{--<div class="col-md-2 col-sm-2 col-xs-3 wd50-480">--}}
    {{--<div class="partner-logo">--}}
    {{--<a href="{{route('home.view',$item['id'])}}"><img src="{{asset($item['avatar'])}}" alt="">{{$item['name']}}</a>--}}
    {{--<p><a href="#">{{$item['total_product']}} sản phẩm</a></p>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--@endforeach--}}
    {{--@endif--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</section>--}}
@endsection
