@extends('layouts.shop')

@section('content')
    <!-- Main charts -->
    <!-- Main Slider -->

    <section class="men-shopping">
        <div class="container">
            <div class="row">
                @if(count($product_list)>0)
                    <div class="col-md-12">
                        @include('layouts.flash_message')
                        <h4>Tổng số: {{count($product_list)}} sản phẩm</h4>
                    </div>
                    @foreach($product_list as $item)
                        <div class="col-md-3 col-sm-6 col-xs-6 full-wd-600">
                            <div class="shopping-col">
                                <div class="product-img">
                                    <a href="{{route('home.view',['id'=>$item->product_id,'slug'=>str_slug($item->name)])}}"><img
                                                src="{{asset($item->avatar)}}" alt=""></a>
                                    <div class="product-over-box">
                                        <form action="{{route('cart.create')}}" method="post">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="product_id" value="{{$item->product_id}}">
                                            <button type="submit"><i class="fa fa-cart-arrow-down"
                                                                     aria-hidden="true"></i>Thêm vào giỏ
                                            </button>
                                        </form>
                                        {{--<a href="#"><i class="icofont icofont-cart-alt"></i></a>--}}
                                    </div>
                                </div>
                                <div class="product-info text-center">
                                    <h4>
                                        <a href="{{route('home.view',['id'=>$item->product_id,'slug'=>str_slug($item->name)])}}">{{$item->name}}</a>
                                    </h4>
                                    <p>
                                        <del>{{number_format($item->price)}}vnđ
                                        </del> {{number_format($item->price_discount)}}vnđ
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <h4>Không có sản phẩm cần tìm !</h4>
                @endif
            </div>
        </div>
        <!-- Pagination -->
        <div class="page-pagination">
            {{ $product_list->links() }}
        </div>
    </section>

    @include('layouts.separator')
@endsection
