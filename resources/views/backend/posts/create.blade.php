@extends('layouts.admin')
@section('bercum')
    <a href="{{route('users.create')}}">Tạo bài viết</a>
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
                <form class="panel-body" method="post">
                    {{ csrf_field() }}
                    <div class="input-group">
                    <span class="input-group-btn">
                        <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-info"
                           style="color: white">
                            <i class="fa fa-picture-o"></i> Chọn ảnh bìa
                        </a>
                    </span>
                        <input id="thumbnail" class="form-control" type="text" name="avatar" style="display: none">
                    </div>
                    <img id="holder" style="margin-top:15px;max-height:150px; margin-bottom: 15px">
                    <div class="form-group form-group-material">
                        <label class="display-block has-margin">Tên bài viết <span class="text-danger">*</span></label>
                        <input type="text" class="form-control typeahead-basic" name="name">
                    </div>
                    <div class="form-group form-group-material">
                        <label class="display-block has-margin">Tóm tắt bài viết <span
                                    class="text-danger">*</span></label>
                        <textarea class="form-control typeahead-basic" name="summary">

                        </textarea>
                    </div>
                    <div class="form-group">
                        <label class="display-block has-margin">Nội dung <span class="text-danger">*</span></label>
                        <textarea cols="18" rows="18" class="form-control my-editor" placeholder="Nội dung bài viết ..."
                                  name="body"></textarea>
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
@section('js')
    <script type="text/javascript" src="{{asset('assets/js/plugins/forms/styling/uniform.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/plugins/editors/wysihtml5/wysihtml5.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/plugins/editors/wysihtml5/toolbar.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/plugins/editors/wysihtml5/parsers.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/plugins/notifications/jgrowl.min.js')}}"></script>
    {{--editor--}}
    <script type="text/javascript" src="{{asset('assets/js/plugins/tinymce/jquery.tinymce.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/plugins/tinymce/tinymce.min.js')}}"></script>
    {{--<script type="text/javascript" src="{{asset('assets/js/pages/editor_wysihtml5.js')}}"></script>--}}
    <script>
        tinymce.init({
            path_absolute: "/",
            selector: "textarea",
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
            relative_urls: false,
            file_browser_callback: function (field_name, url, type, win) {
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                var y = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;

                var cmsURL = '{{asset('/')}}laravel-filemanager?field_name=' + field_name;
                if (type == 'image') {
                    cmsURL = cmsURL + "&type=Images";
                } else {
                    cmsURL = cmsURL + "&type=Files";
                }

                tinyMCE.activeEditor.windowManager.open({
                    file: cmsURL,
                    title: 'Filemanager',
                    width: x * 0.8,
                    height: y * 0.8,
                    resizable: "yes",
                    close_previous: "no"
                });
            }
        });
    </script>
    {{--Standalone button--}}
    <script src="{{asset('vendor/laravel-filemanager/js/lfm.js')}}"></script>
    <script>
        $(document).ready(function () {
            var route_prefix = "{{ url(config('lfm.url_prefix')) }}";
            $('#lfm').filemanager('image', {prefix: route_prefix});
        })
    </script>


@endsection