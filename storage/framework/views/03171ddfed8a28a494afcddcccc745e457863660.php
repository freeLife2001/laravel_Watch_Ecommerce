<?php $__env->startSection('bercum'); ?>
    <a href="<?php echo e(route('posts.index')); ?>"></i> Danh sách bài viết</a>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <!-- Square thumbs -->
    <div class="row">
        <div class="col-lg-12" style="margin-bottom: 10px">
            <?php echo $__env->make('layouts.flash_message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <a href="<?php echo e(route('posts.create')); ?>" class="btn btn-info" style="margin-top: 10px"><i class="icon-googleplus5"></i> Thêm bài viết</a>

        </div>
        <!-- Basic datatable -->
        <div class="panel panel-flat">
            <table class="table datatable-basic">
                <thead>
                <tr>
                    <th>Ảnh bìa</th>
                    <th>Tên</th>
                    <th>Người tạo</th>
                    <th>Thời gian tạo</th>
                    <th class="text-center">Tác vụ</th>
                </tr>
                </thead>
                <tbody>
                <?php if(count($data)>0): ?>
                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><img src="<?php echo e(asset($item->avatar)); ?>" class="img-circle img-md"></td>
                            <td><a href="<?php echo e(route('posts.view',$item->id)); ?>"><?php echo e($item->name); ?></a></td>
                            <td><?php echo e($item->user_create); ?></td>
                            <td><?php echo e(date('d/m/Y H:i:s',strtotime($item->created_at))); ?></td>
                            <td class="text-center">
                                <a href="<?php echo e(route('posts.view',$item->id)); ?>" class="btn btn-info" title="Xem"><i class="icon-eye4"></i></a>
                                <a href="<?php echo e(route('posts.edit',$item->id)); ?>" class="btn bg-brown" title="Sửa"><i class="icon-pencil6"></i></a>
                                <a href="<?php echo e(route('posts.delete',$item->id)); ?>" class="btn btn-danger" title="Xóa"><i class="icon-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                </tbody>
            </table>
        </div>

    </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>