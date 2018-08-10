@extends('layouts.admin')
@section('bercum')
    <a href="{{route('users.create')}}">Chi tiết bài viết</a>
@endsection
@section('css')

@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('layouts.flash_message')
        </div>
        <div class="col-lg-12" style="margin-bottom: 10px">
            <div class="panel">
                <div class="panel-body">
                    {{ csrf_field() }}
                    <h3 class="display-block has-margin">{{$data['name']}} </h3>
                    <div class="form-group form-group-material">
                        <span><i class="icon-users4"></i> {{$data['user_create']}}</span>
                        <span><i class="icon-calendar"></i> {{date('d/m/Y H:i:s',strtotime($data['created_at']))}}</span>
                    </div>
                    <div class="form-group form-group-material">
                        {!! $data['summary'] !!}
                    </div>
                    <div class="form-group form-group-material">
                        {!! $data['body'] !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
