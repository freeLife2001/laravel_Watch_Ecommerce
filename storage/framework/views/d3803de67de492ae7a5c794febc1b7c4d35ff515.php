<?php $__env->startSection('bercum'); ?>
    <a href="#"> Sửa chuyên mục</a>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <!-- Square thumbs -->
    <div class="row">
        <div class="col-md-12">
            <?php echo $__env->make('layouts.flash_message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
        <div class="col-lg-12" style="margin-bottom: 10px">
            <div class="panel panel-flat">
                <form class="panel-body" method="post" action="<?php echo e(route('category.update',$category['id'])); ?>">
                    <?php echo e(csrf_field()); ?>

                    <div class="form-group form-group-material">
                        <label class="display-block has-margin">Tên chuyên mục</label>
                        <input type="text" class="form-control typeahead-basic" name="name" value="<?php echo e($category['name']); ?>">
                    </div>
                    <div class="form-group form-group-material">
                        <label class="display-block has-margin">Loại</label>
                        <select name="type" class="form-control typeahead-basic">
                            <option value="1" <?php if($category['type']==1): ?>selected  <?php endif; ?>>Bài viết</option>
                            <option value="0" <?php if($category['type']==0): ?>selected  <?php endif; ?>>Sản phẩm</option>
                        </select>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Cập nhật<i class="icon-arrow-right14 position-right"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>