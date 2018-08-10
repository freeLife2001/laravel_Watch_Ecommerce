@extends('layouts.admin')
@section('bercum')
    <a href="{{route('category.index')}}"></i> Danh sách chuyên mục</a>
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

            <a href="{{route('category.create')}}" class="btn btn-info" style="margin-top: 10px"><i
                        class="icon-googleplus5"></i> Thêm chuyên mục</a>

        </div>
        <!-- Basic datatable -->
        <div class="panel panel-flat">
            <table class="table datatable-basic">
                <thead>
                <tr>
                    <th>Tên</th>
                    <th>Loại</th>
                    <th class="text-center">Tác vụ</th>
                </tr>
                </thead>
                <tbody>
                @if(!empty($category))
                    @foreach($category as $key=>$item)
                        <tr>
                            <td>{{$item->name}}</td>
                            <td>{{$item->type==1?'Bài viết':'Sản phẩm'}}</td>
                            <td class="text-center">
                                <a href="{{route('category.view',$item->id)}}" class="btn btn-info" title="Xem"><i
                                            class="icon-eye4"></i></a>
                                <a href="{{route('category.edit',$item->id)}}" class="btn bg-brown" title="Sửa"><i
                                            class="icon-pencil6"></i></a>
                                <a href="{{route('category.delete',$item->id)}}" class="btn btn-danger" title="Xóa"><i
                                            class="icon-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>

    </div>

@endsection