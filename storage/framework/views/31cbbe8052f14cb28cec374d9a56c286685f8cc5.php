<?php $__env->startSection('bercum'); ?>
    <a href="<?php echo e(route('users.create')); ?>">Chi tiết sản phẩm</a>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <!-- Square thumbs -->
    <h6 class="content-group text-semibold">
        Thêm sản phẩm
    </h6>

    <div class="row">
        <div class="col-md-12">
            <?php echo $__env->make('layouts.flash_message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
        <div class="col-lg-12" style="margin-bottom: 10px">
            <div class="panel">
                <input type="text" value="<?php if(!empty($tag)): ?> <?php echo e(json_encode($tag)); ?><?php else: ?> [] <?php endif; ?>" id="tag_list" hidden>
                <input type="text" value="<?php if(!empty($category)): ?> <?php echo e(json_encode($category)); ?><?php else: ?> [] <?php endif; ?>" id="category_list" hidden>
                <form class="panel-body" method="post" action="<?php echo e(route('products.update',$data['id'])); ?>">
                    <?php echo e(csrf_field()); ?>

                    <div class="input-group">
                    <span class="input-group-btn">
                        <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-info" style="color: white">
                            <i class="fa fa-picture-o"></i> Chọn ảnh bìa
                        </a>
                    </span>
                        <input id="thumbnail" class="form-control" type="text" name="avatar" style="display: none" value="<?php echo e(asset($data['avatar'])); ?>">
                    </div>
                    <img id="holder" style="margin-top:15px;max-height:150px;" src="<?php echo e(asset($data['avatar'])); ?>">
                    <div class="form-group form-group-material">
                        <label class="display-block has-margin">Tên sản phẩm <span class="text-danger">*</span></label>
                        <input type="text" class="form-control typeahead-basic" name="name"  value="<?php echo e($data['name']); ?>">
                    </div>
                    <div class="form-group form-group-material">
                        <label class="display-block has-margin">Giá sản phẩm</label>
                        <input type="text" class="form-control typeahead-basic" name="price"  value="<?php echo e($data['price']); ?>">
                    </div>
                    <div class="form-group form-group-material">
                        <label class="display-block has-margin">Giá khuyến mại</label>
                        <input type="text" class="form-control typeahead-basic" name="price_discount"  value="<?php echo e($data['price_discount']); ?>">
                    </div>
                    <div class="form-group form-group-material">
                        <label class="display-block has-margin">Số lượng</label>
                        <input type="text" class="form-control typeahead-basic" name="total"  value="<?php echo e($data['total']); ?>">
                    </div>
                    <div class="form-group">
                        <label>Chuyên mục <span class="text-danger">*</span></label>
                        <input type="text" value="<?php echo e($category_used_list); ?>" data-role="tagsinput" class="tagsinput-category" name="category" >
                    </div>
                    <div class="form-group">
                        <label>Tag</label>
                        <input type="text" value="<?php echo e($tag_used_list); ?>" data-role="tagsinput" class="tagsinput-typeahead" name="tag" >
                    </div>
                    <div class="form-group">
                        <label class="display-block has-margin">Nội dung</label>
                        <textarea cols="18" rows="18" class="form-control my-editor" placeholder="Nội dung sản phẩm ..." name="contents" ><?php echo $data['contents']; ?></textarea>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Cập nhật<i class="icon-arrow-right14 position-right"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script type="text/javascript" src="<?php echo e(asset('assets/js/plugins/forms/styling/uniform.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('assets/js/plugins/editors/wysihtml5/wysihtml5.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('assets/js/plugins/editors/wysihtml5/toolbar.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('assets/js/plugins/editors/wysihtml5/parsers.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('assets/js/plugins/notifications/jgrowl.min.js')); ?>"></script>
    
    <script type="text/javascript" src="<?php echo e(asset('assets/js/plugins/forms/tags/tagsinput.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('assets/js/plugins/forms/tags/tokenfield.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('assets/js/plugins/ui/prism.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('assets/js/plugins/forms/inputs/typeahead/typeahead.bundle.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('assets/js/pages/tag_custom.js')); ?>"></script>
    
    <script type="text/javascript" src="<?php echo e(asset('assets/js/plugins/tinymce/jquery.tinymce.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('assets/js/plugins/tinymce/tinymce.min.js')); ?>"></script>
    
    <script>
        tinymce.init({
            path_absolute : "/",
            selector: "textarea",
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
            relative_urls: false,
            file_browser_callback : function(field_name, url, type, win) {
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

                var cmsURL = '<?php echo e(asset('/')); ?>laravel-filemanager?field_name=' + field_name;
                if (type == 'image') {
                    cmsURL = cmsURL + "&type=Images";
                } else {
                    cmsURL = cmsURL + "&type=Files";
                }

                tinyMCE.activeEditor.windowManager.open({
                    file : cmsURL,
                    title : 'Filemanager',
                    width : x * 0.8,
                    height : y * 0.8,
                    resizable : "yes",
                    close_previous : "no"
                });
            }
        });
    </script>
    
    <script src="<?php echo e(asset('vendor/laravel-filemanager/js/lfm.js')); ?>"></script>
    <script>
        $(document).ready(function () {
            var route_prefix = "<?php echo e(url(config('lfm.url_prefix'))); ?>";
            $('#lfm').filemanager('image', {prefix: route_prefix});
        })
    </script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>