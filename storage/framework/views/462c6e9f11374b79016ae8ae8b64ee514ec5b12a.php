<?php $__env->startSection('css'); ?>
    <style>
        .user-email {
            font-size: .85rem;
            margin-bottom: 1.5em;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div style="background-size:cover; background-image: url(<?php echo e(Voyager::image( Voyager::setting('admin.bg_image'), config('voyager.assets_path') . '/images/bg.jpg')); ?>); background-position: center center;position:absolute; top:0; left:0; width:100%; height:300px;"></div>
    <div style="height:160px; display:block; width:100%"></div>
    <div style="position:relative; z-index:9; text-align:center;">
        <img src="<?php if( !filter_var(Auth::user()->avatar, FILTER_VALIDATE_URL)): ?><?php echo e(Voyager::image( Auth::user()->avatar )); ?><?php else: ?><?php echo e(Auth::user()->avatar); ?><?php endif; ?>"
             class="avatar"
             style="border-radius:50%; width:150px; height:150px; border:5px solid #fff;"
             alt="<?php echo e(Auth::user()->name); ?> avatar">
        <h4><?php echo e(ucwords(Auth::user()->name)); ?></h4>
        <div class="user-email text-muted"><?php echo e(ucwords(Auth::user()->email)); ?></div>
        <p><?php echo e(Auth::user()->bio); ?></p>
        <a href="<?php echo e(route('voyager.users.edit', Auth::user()->id)); ?>" class="btn btn-primary"><?php echo e(__('voyager::profile.edit')); ?></a>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('voyager::master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>