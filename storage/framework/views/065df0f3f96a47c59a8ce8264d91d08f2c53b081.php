<?php $__env->startSection('bercum'); ?>
    <a href="<?php echo e(route('category.index')); ?>"></i> Danh sách chuyên mục</a>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script type="text/javascript" src="<?php echo e(asset('assets/js/plugins/tables/datatables/datatables.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('assets/js/pages/datatables_basic.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <!-- Square thumbs -->
    <div class="row">
        <div class="col-lg-12" style="margin-bottom: 10px">
            <?php echo $__env->make('layouts.flash_message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <a href="<?php echo e(route('category.create')); ?>" class="btn btn-info" style="margin-top: 10px"><i
                        class="icon-googleplus5"></i> Thêm chuyên mục</a>

        </div>
        <!-- Basic datatable -->
        <div class="panel panel-flat">
            <table class="table datatable-basic">
                <thead>
                <tr>
                    <th>Tên</th>
                    <th>Loại</th>
                    <th class="text-center">Tác vụ</th>
                </tr>
                </thead>
                <tbody>
                <?php if(!empty($category)): ?>
                    <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($item->name); ?></td>
                            <td><?php echo e($item->type==1?'Bài viết':'Sản phẩm'); ?></td>
                            <td class="text-center">
                                <a href="<?php echo e(route('category.view',$item->id)); ?>" class="btn btn-info" title="Xem"><i
                                            class="icon-eye4"></i></a>
                                <a href="<?php echo e(route('category.edit',$item->id)); ?>" class="btn bg-brown" title="Sửa"><i
                                            class="icon-pencil6"></i></a>
                                <a href="<?php echo e(route('category.delete',$item->id)); ?>" class="btn btn-danger" title="Xóa"><i
                                            class="icon-trash"></i></a>
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