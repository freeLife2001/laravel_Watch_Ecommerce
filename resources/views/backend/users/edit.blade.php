@extends('layouts.admin')
@section('bercum')
    <a href="#"> Sửa người dùng</a>
@endsection
@section('css')

@endsection
@section('js')

@endsection
@section('content')
    <!-- Square thumbs -->
    <h6 class="content-group text-semibold">
        Sửa người dùng
    </h6>

    <div class="row">
        <div class="col-md-12">
            @include('layouts.flash_message')
        </div>
        <div class="col-lg-12" style="margin-bottom: 10px">
            <div class="panel panel-flat">
                <form class="panel-body" method="post" action="{{route('users.update',$users['id'])}}">
                    {{ csrf_field() }}
                    <div class="form-group form-group-material">
                        <label class="display-block has-margin">Tên người dùng <span
                                    class="text-danger">*</span></label>
                        <input type="text" class="form-control typeahead-basic" name="name" value="{{$users['name']}}">
                    </div>
                    <div class="form-group form-group-material">
                        <label class="display-block has-margin">Email <span class="text-danger">*</span></label>
                        <input type="text" class="form-control typeahead-basic" name="email"
                               value="{{$users['email']}}">
                    </div>
                    <div class="form-group form-group-material">
                        <label class="display-block has-margin">Số điện thoại <span class="text-danger">*</span></label>
                        <input type="text" class="form-control typeahead-basic" name="phone"
                               value="{{$users['phone']}}">
                    </div>
                    <div class="form-group form-group-material">
                        <label class="display-block has-margin">Địa chỉ</label>
                        <input type="text" class="form-control typeahead-basic" name="address"
                               value="{{$users['address']}}">
                    </div>
                    <div class="form-group form-group-material">
                        <label class="display-block has-margin">Quyền <span class="text-danger">*</span></label>
                        <select name="role_id" class="form-control typeahead-basic">
                            <option value="1" @if($users['role_id']==1)selected @endif>Admin</option>
                            <option value="0" @if($users['role_id']==0)selected @endif>Khách hàng</option>
                        </select>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Cập nhật<i
                                    class="icon-arrow-right14 position-right"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection