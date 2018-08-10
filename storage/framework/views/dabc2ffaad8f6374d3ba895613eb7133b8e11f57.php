<?php $__env->startSection('bercum'); ?>
    <a href="<?php echo e(route('users.index')); ?>"></i> Danh sách người dùng</a>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>

    <?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>

    <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<!-- Square thumbs -->
<h6 class="content-group text-semibold">
    Danh sách người dùng
</h6>

<div class="row">
    <div class="col-lg-12" style="margin-bottom: 10px">
        <?php echo $__env->make('layouts.flash_message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <a href="<?php echo e(route('users.create')); ?>" class="btn btn-info" style="margin-top: 10px"><i class="icon-user-plus"></i> Thêm người dùng</a>

    </div>
    <?php if(!empty($users)): ?>
        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-body">
                    <div class="media">
                        <div class="media-left">
                            <a href="<?php echo e(asset('assets/images/demo/images/3.png')); ?>" data-popup="lightbox">
                                <img src="<?php echo e(asset('assets/images/demo/users/face1.jpg')); ?>" style="width: 70px; height: 70px;" class="img-circle img-md" alt="">
                            </a>
                        </div>

                        <div class="media-body">
                            <h6 class="media-heading"><?php echo e($item->name); ?></h6>
                            <p class="text-muted"><?php echo e($item->email); ?></p>

                            <ul class="icons-list">
                                <li><a class="btn btn-info" href="<?php echo e(route('users.view',$item->id)); ?>" data-popup="tooltip" title="Xem" data-container="body"><i class="icon-eye4"></i></a></li>
                                <li><a class="btn btn-success" href="<?php echo e(route('users.edit',$item->id)); ?>" data-popup="tooltip" title="Sửa" data-container="body"><i class="icon-pencil6"></i></a></li>
                                <li><a class="btn btn-danger" href="<?php echo e(route('users.delete',$item->id)); ?>" data-popup="tooltip" title="Xóa" data-container="body"><i class="icon-trash"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
</div>

    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>