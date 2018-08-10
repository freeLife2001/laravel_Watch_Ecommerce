@extends('layouts.admin')
@section('bercum')
    <a href="{{route('posts.index')}}"></i> Danh sách bài viết</a>
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

            <a href="{{route('posts.create')}}" class="btn btn-info" style="margin-top: 10px"><i
                        class="icon-googleplus5"></i> Thêm bài viết</a>

        </div>
        <!-- Basic datatable -->
        <div class="panel panel-flat">
            <table class="table datatable-basic">
                <thead>
                <tr>
                    <th>Ảnh bìa</th>
                    <th>Tên</th>
                    <th>Người tạo</th>
                    <th>Thời gian tạo</th>
                    <th class="text-center">Tác vụ</th>
                </tr>
                </thead>
                <tbody>
                @if(count($data)>0)
                    @foreach($data as $key=>$item)
                        <tr>
                            <td><img src="{{asset($item->avatar)}}" class="img-circle img-md"></td>
                            <td><a href="{{route('posts.view',$item->id)}}">{{$item->name}}</a></td>
                            <td>{{$item->user_create}}</td>
                            <td>{{date('d/m/Y H:i:s',strtotime($item->created_at))}}</td>
                            <td class="text-center">
                                <a href="{{route('posts.view',$item->id)}}" class="btn btn-info" title="Xem"><i
                                            class="icon-eye4"></i></a>
                                <a href="{{route('posts.edit',$item->id)}}" class="btn bg-brown" title="Sửa"><i
                                            class="icon-pencil6"></i></a>
                                <a href="{{route('posts.delete',$item->id)}}" class="btn btn-danger" title="Xóa"><i
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