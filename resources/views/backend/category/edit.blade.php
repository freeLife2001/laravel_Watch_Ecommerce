@extends('layouts.admin')
@section('bercum')
    <a href="#"> Sửa chuyên mục</a>
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
                <form class="panel-body" method="post" action="{{route('category.update',$category['id'])}}">
                    {{ csrf_field() }}
                    <div class="form-group form-group-material">
                        <label class="display-block has-margin">Tên chuyên mục</label>
                        <input type="text" class="form-control typeahead-basic" name="name"
                               value="{{$category['name']}}">
                    </div>
                    <div class="form-group form-group-material">
                        <label class="display-block has-margin">Loại</label>
                        <select name="type" class="form-control typeahead-basic">
                            <option value="1" @if($category['type']==1)selected @endif>Bài viết</option>
                            <option value="0" @if($category['type']==0)selected @endif>Sản phẩm</option>
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