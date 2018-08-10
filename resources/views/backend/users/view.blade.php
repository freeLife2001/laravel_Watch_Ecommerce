@extends('layouts.admin')
@section('bercum')
    <a href="#"> Chi tiết người dùng</a>
@endsection
@section('css')

@endsection
@section('js')

@endsection
@section('content')
    <!-- Square thumbs -->
    <h6 class="content-group text-semibold">
        Chi tiết người dùng
    </h6>

    <div class="row">
        <div class="col-md-12">
            @include('layouts.flash_message')
        </div>
        <div class="col-lg-12" style="margin-bottom: 10px">
            <div class="panel panel-flat">
                <div class="panel-body">
                    <div class="form-group form-group-material">
                        <label class="display-block has-margin">Tên người dùng</label>
                        <input type="text" class="form-control typeahead-basic" name="name" value="{{$users['name']}}"
                               disabled>
                    </div>
                    <div class="form-group form-group-material">
                        <label class="display-block has-margin">Email</label>
                        <input type="text" class="form-control typeahead-basic" name="email" value="{{$users['email']}}"
                               disabled>
                    </div>
                    <div class="form-group form-group-material">
                        <label class="display-block has-margin">Số điện thoại</label>
                        <input type="text" class="form-control typeahead-basic" name="phone" value="{{$users['phone']}}"
                               disabled>
                    </div>
                    <div class="form-group form-group-material">
                        <label class="display-block has-margin">Địa chỉ</label>
                        <input type="text" class="form-control typeahead-basic" name="address"
                               value="{{$users['address']}}" disabled>
                    </div>
                    <div class="form-group form-group-material">
                        <label class="display-block has-margin">Quyền</label>
                        <select name="role_id" class="form-control typeahead-basic" disabled>
                            <option value="1" @if($users['role_id']==1)selected @endif>Admin</option>
                            <option value="0" @if($users['role_id']==0)selected @endif>Khách hàng</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection