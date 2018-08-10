@extends('layouts.admin')
@section('bercum')
    <a href="{{route('category.create')}}">Tạo chuyên mục</a>
@endsection
@section('css')

@endsection
@section('js')

@endsection
@section('content')
    <!-- Square thumbs -->
    <h6 class="content-group text-semibold">
        Thêm chuyên mục
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
                        <label class="display-block has-margin">Tên chuyên mục <span
                                    class="text-danger">*</span></label>
                        <input type="text" class="form-control typeahead-basic" name="name">
                    </div>

                    <div class="form-group form-group-material">
                        <label class="display-block has-margin">Loại</label>
                        <select name="type" class="form-control typeahead-basic">
                            <option value="1">Bài viết</option>
                            <option value="0">Sản phẩm</option>
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