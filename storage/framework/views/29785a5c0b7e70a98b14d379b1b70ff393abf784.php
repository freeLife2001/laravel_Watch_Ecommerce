<?php $__env->startSection('bercum'); ?>
    <a href="<?php echo e(route('users.create')); ?>">Chi tiết bài viết</a>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <?php echo $__env->make('layouts.flash_message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
        <div class="col-lg-12" style="margin-bottom: 10px">
            <div class="panel">
                <div class="panel-body">
                    <?php echo e(csrf_field()); ?>

                    <h3 class="display-block has-margin"><?php echo e($data['name']); ?> </h3>
                    <div class="form-group form-group-material">
                        <span><i class="icon-users4"></i> <?php echo e($data['user_create']); ?></span>
                        <span><i class="icon-calendar"></i> <?php echo e(date('d/m/Y H:i:s',strtotime($data['created_at']))); ?></span>
                    </div>
                    <div class="form-group form-group-material">
                        <?php echo $data['summary']; ?>

                    </div>
                    <div class="form-group form-group-material">
                        <?php echo $data['body']; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>