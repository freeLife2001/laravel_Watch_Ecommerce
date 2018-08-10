@extends('layouts.admin')
@section('bercum')
    <a href="#"> Chi tiết đơn hàng</a>
@endsection
@section('css')

@endsection
@section('js')

@endsection
@section('content')
    <!-- Square thumbs -->
    <h6 class="content-group text-semibold">
        Chi tiết đơn hàng
    </h6>

    <div class="row">
        <div class="col-md-12">
            @include('layouts.flash_message')
        </div>
        <div class="col-lg-12" style="margin-bottom: 10px">
            <div class="panel panel-flat">
                <div class="panel-body">
                    <div class="form-group form-group-material">
                        <label class="display-block has-margin">Tên đơn hàng</label>
                        <input type="text" class="form-control typeahead-basic" name="name" value="{{$bill['name']}}"
                               disabled>
                    </div>
                    <div class="form-group form-group-material">
                        <label class="display-block has-margin">Người mua</label>
                        <input type="text" class="form-control typeahead-basic" name="name" value="{{$bill['buyer']}}"
                               disabled>
                    </div>
                    <div class="form-group form-group-material">
                        <label class="display-block has-margin">Email</label>
                        <input type="text" class="form-control typeahead-basic" name="phone" value="{{$bill['email']}}"
                               disabled>
                    </div>
                    <div class="form-group form-group-material">
                        <label class="display-block has-margin">Số điện thoại</label>
                        <input type="text" class="form-control typeahead-basic" name="phone" value="{{$bill['phone']}}"
                               disabled>
                    </div>
                    <div class="form-group form-group-material">
                        <label class="display-block has-margin">Địa chỉ</label>
                        <input type="text" class="form-control typeahead-basic" name="address"
                               value="{{$bill['address']}}" disabled>
                    </div>

                    <div class="form-group form-group-material">
                        <label class="display-block has-margin">Số lượng hàng</label>
                        <input type="text" class="form-control typeahead-basic" name="name" value="{{$bill['total']}}"
                               disabled>
                    </div>
                    <div class="form-group form-group-material">
                        <label class="display-block has-margin">Tổng tiền</label>
                        <input type="text" class="form-control typeahead-basic" name="email" value="{{$bill['price']}}"
                               disabled>
                    </div>
                    <div class="form-group form-group-material">
                        <label class="display-block has-margin">Trạng thái</label>
                        <input type="text" class="form-control typeahead-basic" name="email"
                               value="{{$bill['status']==1?'Đã xác nhận':'Chờ xác nhận'}}" disabled>
                    </div>
                    <div class="form-group form-group-material">
                        <label class="display-block has-margin">Danh sách sản phẩm</label>
                        <table class="table table-bordered table-responsive">
                            <tr>
                                <td>Stt</td>
                                <td>Ảnh</td>
                                <td>Mã sản phẩm</td>
                                <td>Tên sản phẩm</td>
                                <td>Giá</td>
                            </tr>
                            @if(!empty($product_list))
                                @foreach($product_list as $key=>$item)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td><img src="{{asset($item['avatar'])}}" class="img-circle img-md"></td>
                                        <td>TH-{{$item['id']}}</td>
                                        <td>{{$item['name']}}</td>
                                        <td>{{number_format($item['price_discount'])}} vnđ (
                                            <del>{{$item['price']}}</del>
                                            ) vnđ
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection