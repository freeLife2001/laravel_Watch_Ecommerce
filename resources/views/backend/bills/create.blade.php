@extends('layouts.admin')
@section('bercum')
    <a href="{{route('users.create')}}">Tạo hóa đơn</a>
@endsection
@section('css')

@endsection
@section('js')

@endsection
@section('content')
    <!-- Square thumbs -->
    <h6 class="content-group text-semibold">
        Thêm hóa đơn
    </h6>

    <div class="row">
        <div class="col-md-12">
            @include('layouts.flash_message')
        </div>
        <div class="col-lg-12" style="margin-bottom: 10px">
            <div class="panel panel-flat">
                <form class="panel-body" method="post">
                    {{ csrf_field() }}
                    <div class="form-group form-group-material">
                        <label class="display-block has-margin">Tên hóa đơn <span class="text-danger">*</span></label>
                        <input type="text" class="form-control typeahead-basic" name="name">
                    </div>
                    <div class="form-group form-group-material">
                        <label class="display-block has-margin">Mật Khẩu <span class="text-danger">*</span></label>
                        <input type="password" class="form-control typeahead-basic" name="password">
                    </div>
                    <div class="form-group form-group-material">
                        <label class="display-block has-margin">Nhập lại mật khẩu <span
                                    class="text-danger">*</span></label>
                        <input type="password" class="form-control typeahead-basic" name="repassword">
                    </div>
                    <div class="form-group form-group-material">
                        <label class="display-block has-margin">Email <span class="text-danger">*</span></label>
                        <input type="text" class="form-control typeahead-basic" name="email">
                    </div>
                    <div class="form-group form-group-material">
                        <label class="display-block has-margin">Số điện thoại <span class="text-danger">*</span></label>
                        <input type="text" class="form-control typeahead-basic" name="phone">
                    </div>
                    <div class="form-group form-group-material">
                        <label class="display-block has-margin">Địa chỉ</label>
                        <input type="text" class="form-control typeahead-basic" name="address">
                    </div>
                    <div class="form-group form-group-material">
                        <label class="display-block has-margin">Quyền <span class="text-danger">*</span></label>
                        <select name="role_id" class="form-control typeahead-basic">
                            <option value="1">Admin</option>
                            <option value="0">Khách hàng</option>
                        </select>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Tạo<i
                                    class="icon-arrow-right14 position-right"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection