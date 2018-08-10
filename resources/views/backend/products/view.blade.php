@extends('layouts.admin')
@section('bercum')
    <a href="{{route('users.create')}}">Chi tiết sản phẩm</a>
@endsection
@section('css')
@endsection
@section('content')
    <!-- Square thumbs -->
    <h6 class="content-group text-semibold">
        Thêm sản phẩm
    </h6>

    <div class="row">
        <div class="col-md-12">
            @include('layouts.flash_message')
        </div>
        <div class="col-lg-12" style="margin-bottom: 10px">
            <div class="panel">
                <div class="panel-body" method="post">

                    <img id="holder" style="margin-top:15px;max-height:150px;" src="{{asset($data['avatar'])}}">
                    <div class="form-group form-group-material">
                        <label class="display-block has-margin">Tên sản phẩm <span class="text-danger">*</span></label>
                        <input type="text" class="form-control typeahead-basic" name="name" disabled
                               value="{{$data['name']}}">
                    </div>
                    <div class="form-group form-group-material">
                        <label class="display-block has-margin">Giá sản phẩm</label>
                        <input type="text" class="form-control typeahead-basic" name="price" disabled
                               value="{{$data['price']}}">
                    </div>
                    <div class="form-group form-group-material">
                        <label class="display-block has-margin">Giá khuyến mại</label>
                        <input type="text" class="form-control typeahead-basic" name="price_discount" disabled
                               value="{{$data['price_discount']}}">
                    </div>
                    <div class="form-group form-group-material">
                        <label class="display-block has-margin">Số lượng</label>
                        <input type="text" class="form-control typeahead-basic" name="total" disabled
                               value="{{$data['total']}}">
                    </div>
                    <div class="form-group form-group-material">
                        <label class="display-block has-margin">Đã bán</label>
                        <input type="text" class="form-control typeahead-basic" name="total" disabled
                               value="{{$data['sold']}}">
                    </div>
                    <div class="form-group">
                        <label>Chuyên mục <span class="text-danger">*</span></label>
                        <input type="text" value="{{$category_list}}" class="form-control" name="category" disabled>
                    </div>
                    <div class="form-group">
                        <label>Tag</label>
                        <input type="text" value="{{$tag_list}}" class="form-control" name="tag" disabled>
                    </div>
                    <div class="form-group">
                        <label class="display-block has-margin">Nội dung</label>
                        <textarea cols="18" rows="18" class="form-control my-editor" placeholder="Nội dung sản phẩm ..."
                                  name="contents" disabled>{!! $data['content'] !!}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script type="text/javascript" src="{{asset('assets/js/plugins/forms/styling/uniform.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/plugins/editors/wysihtml5/wysihtml5.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/plugins/editors/wysihtml5/toolbar.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/plugins/editors/wysihtml5/parsers.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/plugins/notifications/jgrowl.min.js')}}"></script>
    {{--tag--}}
    <script type="text/javascript" src="{{asset('assets/js/plugins/forms/tags/tagsinput.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/plugins/forms/tags/tokenfield.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/plugins/ui/prism.min.js')}}"></script>
    <script type="text/javascript"
            src="{{asset('assets/js/plugins/forms/inputs/typeahead/typeahead.bundle.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/pages/tag_custom.js')}}"></script>
    {{--editor--}}
    {{--Standalone button--}}
@endsection