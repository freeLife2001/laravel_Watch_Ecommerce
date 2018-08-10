@extends('layouts.admin')
@section('bercum')
    <a href="#"> Chi tiết chuyên mục</a>
@endsection
@section('css')

@endsection
@section('js')

@endsection
@section('content')
    <!-- Square thumbs -->
    <div class="row">
        <div class="col-md-12">
            @include('layouts.flash_message')
        </div>
        <div class="col-lg-12" style="margin-bottom: 10px">
            <div class="panel panel-flat">
                <div class="panel-body">
                    <div class="form-group form-group-material">
                        <label class="display-block has-margin">Tên chuyên mục</label>
                        <input type="text" class="form-control typeahead-basic" name="name"
                               value="{{$category['name']}}" disabled>
                    </div>
                    <div class="form-group form-group-material">
                        <label class="display-block has-margin">Loại</label>
                        <select name="role_id" class="form-control typeahead-basic" disabled>
                            <option value="1" @if($category['type']==1)selected @endif>Bài viết</option>
                            <option value="0" @if($category['type']==0)selected @endif>Sản phẩm</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection