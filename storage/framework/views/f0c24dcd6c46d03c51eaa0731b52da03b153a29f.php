<?php $__env->startSection('bercum'); ?>
    <a href="<?php echo e(route('bill.index')); ?>"></i> Danh sách đơn hàng</a>
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

            

        </div>
        <!-- Basic datatable -->
        <div class="panel panel-flat">
            <table class="table datatable-basic">
                <thead>
                <tr>
                    <th>Stt</th>
                    <th>Tên</th>
                    <th>Số lượng</th>
                    <th>Tổng tiền</th>
                    <th>Người mua</th>
                    <td>Trạng thái</td>
                    <th class="text-center">Tác vụ</th>
                </tr>
                </thead>
                <tbody>
                <?php if(count($bill)>0): ?>
                    <?php $__currentLoopData = $bill; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($key+1); ?></td>
                            <td><a href="<?php echo e(route('bill.view',$item->id)); ?>"><?php echo e($item->name); ?></a></td>
                            <td><?php echo e($item->total); ?></td>
                            <td><?php echo e(number_format($item->price)); ?></td>
                            <td><?php echo e($item->buyer); ?></td>
                            <td><?php echo e($item->status==1?'Đã xác nhận':'Chờ xác nhận'); ?></td>
                            <td class="text-center">
                                <a href="<?php echo e(route('bill.view',$item->id)); ?>" class="btn btn-info" title="Xem"><i
                                            class="icon-eye4"></i></a>
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