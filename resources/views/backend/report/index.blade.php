@extends('layouts.admin')
@section('bercum')
    <a href="#"></i> Thống kê tồn kho</a>
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
        {{--<div class="panel panel-flat">--}}
            {{--<div class="panel-body">--}}
                {{--<form method="post" action="{{route('report.search')}}">--}}
                    {{--{{ csrf_field() }}--}}
                    {{--<div class="row">--}}
                        {{--<div class="col-md-3">--}}
                            {{--<div class="form-group">--}}
                                {{--<label>Chuyên mục</label>--}}
                                {{--<select name="category_id" class="form-control">--}}
                                    {{--<option value="0">Tất cả</option>--}}
                                    {{--@if(!empty($category))--}}
                                        {{--@foreach($category as $key=>$item)--}}
                                            {{--<option value="{{$item->id}}">{{$item->name}}</option>--}}
                                        {{--@endforeach--}}
                                    {{--@endif--}}
                                {{--</select>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="text-right">--}}
                        {{--<button type="submit" class="btn btn-primary">Thống kê <i class="icon-search4 position-right"></i></button>--}}
                    {{--</div>--}}
                {{--</form>--}}
            {{--</div>--}}
        {{--</div>--}}
        <!-- Basic datatable -->
        <div class="panel panel-flat">
            <div class="col-md-12">
                <h3>{{$mess}}</h3>
            </div>
            <table class="table datatable-basic">
                <thead>
                <tr>
                    <th>Tên</th>
                    <th>Ảnh</th>
                    <th>Giá</th>
                    <th>Giá khuyến mại</th>
                    <th>Tổng</th>
                    <th>Tồn</th>
                    <th class="text-center">Chi tiết sp</th>
                </tr>
                </thead>
                <tbody>
                @if(!empty($data))
                    @foreach($data as $key=>$item)
                        <tr>
                            <td>{{$item->name}}</td>
                            <td><img src="{{asset($item->avatar)}}" class="img-circle img-md"></td>
                            <td>{{number_format($item->price)}}</td>
                            <td>{{number_format($item->price_discount)}}</td>
                            <td>
                                {{$item->total}}
                            </td>
                            <td>
                                {{$item->total - $item->sold}}

                            </td>
                            <td class="text-center">
                                <a href="{{route('products.view',$item->id)}}" class="btn btn-info" title="Xem"><i
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
@section('js')
    <script>
        $('.datepicker').datepicker();
    </script>
@endsection