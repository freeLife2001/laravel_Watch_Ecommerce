@extends('layouts.admin')
@section('bercum')
    <a href="{{route('bill.index')}}"></i> Danh sách đơn hàng</a>
@endsection
@section('css')

@endsection
@section('js')

@endsection
@section('content')
    <!-- Square thumbs -->
    <div class="row">
        <div class="col-lg-12" style="margin-bottom: 10px">
            @include('layouts.flash_message')

            {{--<a href="{{route('bill.create')}}" class="btn btn-info" style="margin-top: 10px"><i class="icon-googleplus5"></i> Thêm đơn hàng</a>--}}

        </div>
        <!-- Basic datatable -->
        <div class="panel panel-flat">
            <table class="table datatable-basic">
                <thead>
                <tr>
                    <th>Stt</th>
                    <th>Tên</th>
                    <th>Số lượng</th>
                    <th>Tổng tiền</th>
                    <th>Người mua</th>
                    <td>Trạng thái</td>
                    <th class="text-center">Tác vụ</th>
                </tr>
                </thead>
                <tbody>
                @if(count($bill)>0)
                    @foreach($bill as $key=>$item)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td><a href="{{route('bill.view',$item->id)}}">{{$item->name}}</a></td>
                            <td>{{$item->total}}</td>
                            <td>{{number_format($item->price)}}</td>
                            <td>{{$item->buyer}}</td>
                            <td>{{$item->status==1?'Đã xác nhận':'Chờ xác nhận'}}</td>
                            <td class="text-center">
                                <a href="{{route('bill.view',$item->id)}}" class="btn btn-info" title="Xem"><i
                                            class="icon-eye4"></i></a>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection