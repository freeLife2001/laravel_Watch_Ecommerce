@extends('layouts.shop')
@section('content')
    <!-- Main charts -->
    <!-- Main Slider -->
    <?php
    $total = 0;
    $price = 0;
    $product_list = [];
    ?>

    <section class="cart-area">
        <div class="container">
            <div class="ror">

                <div class="col-md-12">
                    @include('layouts.flash_message')
                    <h4>Thông tin giỏ hàng:</h4>
                    @if(count($data)==0)
                        <h4>Chưa có sản phẩm trong giỏ của bạn !</h4>
                    @else
                        <div class="cart-col">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Tổng</th>
                                    <th>Xóa</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $key=>$item)
                                    <?php
                                    $price += $item->subtotal;
                                    $total += $item->qty;
                                    $product_list[$key]['id'] = $item->id;
                                    $product_list[$key]['price'] = $item->subtotal;
                                    $product_list[$key]['total'] = $item->qty;
                                    ?>
                                    <tr>
                                        <td>
                                            <div class="product-thumb">
                                                <a href="{{route('home.view',['id'=>$item->id,'slug'=>str_slug($item->name)])}}">
                                                    <img src="{{asset($item->options->avatar)}}" alt="{{$item->name}}">
                                                </a>
                                                <a href="{{route('home.view',['id'=>$item->id,'slug'=>str_slug($item->name)])}}">
                                                    {{$item->name}}
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            <p>{{number_format($item->price)}} vnđ</p>
                                            <p>
                                                <del> {{number_format($item->options->price)}}</del>
                                                vnđ
                                            </p>
                                        </td>
                                        <td>
                                            <select name="total" class="total" at="{{$item->rowId}}">
                                                @if($item->options->total>0)
                                                    @for($i=1;$i<=$item->options->total;$i++)
                                                        <option value="{{$i}}" {{ $item->qty==$i ? 'selected' : '' }} >{{$i}}</option>
                                                    @endfor
                                                @endif
                                            </select>
                                        </td>
                                        <td>{{number_format($item->subtotal)}}</td>
                                        <td><a href="{{route('cart.delete',$item->rowId)}}"><i
                                                        class="fa fa-window-close" aria-hidden="true"></i></a></td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- Shipping address Start -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Tổng Hóa Đơn</h3>
                        </div>
                        <div class="col-md-12">
                            <div class="shipping-col">
                                <ul>
                                    <li>Tiền hàng: <span class="pull-right">{{number_format($price)}} vnđ</span></li>
                                    <li>Phí vận chuyển:<span class="pull-right">miễn phí</span></li>
                                    <li>Tổng:<span class="pull-right">{{number_format($price)}} vnđ</span></li>
                                </ul>
                                <div class="text-right">
                                    @if(Auth::user())
                                        <form method="post" action="{{route('cart.create_bill')}}">
                                            {{ csrf_field() }}
                                            <input type="text" hidden value="{{$total}}" name="total">
                                            <input type="text" hidden value="{{$price}}" name="price">
                                            <input type="text" hidden value="{{json_encode($product_list)}}"
                                                   name="bill">
                                            <button class="btn btn-default" type="submit">Hoàn thành đặt hàng</button>
                                        </form>
                                    @else
                                        <a href="{{route('login')}}">Đăng nhập để thanh toán</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('layouts.separator')
@endsection
@section('js')
    <script>
        $('.total').on('change', function () {
            var total = $(this).val();
            var id = $(this).attr('at');
            var url = '{{route('cart.cart')}}' + '/cap-nhat-so-luong/' + id + '/' + total;
            console.log(url);
            if (id != null) {
                window.location.replace(url);
            }
        })
    </script>
@endsection