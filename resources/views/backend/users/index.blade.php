@extends('layouts.admin')
@section('bercum')
    <a href="{{route('users.index')}}"></i> Danh sách người dùng</a>
@endsection
@section('css')

@endsection
@section('js')

@endsection
@section('content')
    <!-- Square thumbs -->
    <h6 class="content-group text-semibold">
        Danh sách người dùng
    </h6>

    <div class="row">
        <div class="col-lg-12" style="margin-bottom: 10px">
            @include('layouts.flash_message')

            <a href="{{route('users.create')}}" class="btn btn-info" style="margin-top: 10px"><i
                        class="icon-user-plus"></i> Thêm người dùng</a>

        </div>
        @if(!empty($users))
            @foreach($users as $item)
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-body">
                        <div class="media">
                            <div class="media-left">
                                <a href="{{asset('assets/images/demo/images/3.png')}}" data-popup="lightbox">
                                    <img src="{{asset('assets/images/demo/users/face1.jpg')}}"
                                         style="width: 70px; height: 70px;" class="img-circle img-md" alt="">
                                </a>
                            </div>

                            <div class="media-body">
                                <h6 class="media-heading">{{$item->name}}</h6>
                                <p class="text-muted">{{$item->email}}</p>

                                <ul class="icons-list">
                                    <li><a class="btn btn-info" href="{{route('users.view',$item->id)}}"
                                           data-popup="tooltip" title="Xem" data-container="body"><i
                                                    class="icon-eye4"></i></a></li>
                                    <li><a class="btn btn-success" href="{{route('users.edit',$item->id)}}"
                                           data-popup="tooltip" title="Sửa" data-container="body"><i
                                                    class="icon-pencil6"></i></a></li>
                                    <li><a class="btn btn-danger" href="{{route('users.delete',$item->id)}}"
                                           data-popup="tooltip" title="Xóa" data-container="body"><i
                                                    class="icon-trash"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>

@endsection