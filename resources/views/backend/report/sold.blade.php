@extends('layouts.admin')
@section('bercum')
    <a href="#"></i> Thống kê bán hàng</a>
@endsection
@section('css')

@endsection
@section('js')
    <script type="text/javascript" src="{{asset('assets/js/plugins/tables/datatables/datatables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/pages/datatables_basic.js')}}"></script>
@endsection
@section('content')
    <!-- Square thumbs -->
    <div class="row">
        <div class="col-lg-12" style="margin-bottom: 10px">
            @include('layouts.flash_message')
        </div>
        {{--form tìm kiếm--}}
        <div class="panel panel-flat">
            <div class="panel-body">
                <form method="post" action="{{route('report.sold_search')}}">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Khoảng thời gian</label>
                                <select name="type" class="form-control">
                                    <option value="0">Tự chọn</option>
                                    <option value="1">1 tuần</option>
                                    <option value="2">1 tháng</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Ngày bắt đầu <span class="text-danger">*</span></label>
                                <input type="text" class="form-control datepicker" placeholder="dd-mm-yyyy" name="from_date" value="{{date('d-m-Y',strtotime($from_date))}}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Ngày kết thúc <span class="text-danger">*</span></label>
                                <input type="text" class="form-control datepicker" placeholder="dd-mm-yyyy" name="to_date" value="{{date('d-m-Y',strtotime($to_date))}}">
                            </div>
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Thống kê <i class="icon-search4 position-right"></i></button>
                    </div>
                </form>
            </div>
        </div>
        <!-- Basic datatable -->
        <div class="panel panel-flat">
            <div class="col-md-12">
                <h3>{!! $mess !!}</h3>
            </div>
            <table class="table datatable-basic">
                <thead>
                <tr>
                    <th>Stt</th>
                    <th>Tên</th>
                    <th>Ảnh</th>
                    <th>Giá</th>
                    <th>Giá khuyến mại</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                    <th>Người mua</th>
                    <th>Đơn hàng</th>
                    <th class="text-center">Chi tiết sản phẩm</th>
                </tr>
                </thead>
                <tbody>
                @if(!empty($data))
                    @foreach($data as $key=>$item)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$item['name']}}</td>
                            <td><img src="{{asset($item['avatar'])}}" class="img-circle img-md"></td>
                            <td>{{number_format($item['price'])}}</td>
                            <td>{{number_format($item['price_discount'])}}</td>
                            <td>{{$item['product_total_bill']}}</td>
                            <td>{{number_format($item['product_value_bill'])}}</td>
                            <td>{{$item['buyer']}}</td>
                            <td>
                                <a href="{{route('bill.view',$item['bill_id'])}}" class="btn btn-info" title="Xem">{{$item['bill_name']}}</a>
                            </td>
                            <td class="text-center">
                                <a href="{{route('products.view',$item['id'])}}" class="btn btn-info" title="Xem"><i class="icon-eye4"></i></a>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>

    </div>

@endsection
@section('js')
    <script>
        $('.datepicker').datepicker();
    </script>
@endsection