<?php $__env->startSection('bercum'); ?>
    <a href="#"></i> Thống kê tồn kho</a>
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
        </div>
        
        
            
                
                    
                    
                        
                            
                                
                                
                                    
                                    
                                        
                                            
                                        
                                    
                                
                            
                        
                    
                    
                        
                    
                
            
        
        <!-- Basic datatable -->
        <div class="panel panel-flat">
            <div class="col-md-12">
                <h3><?php echo e($mess); ?></h3>
            </div>
            <table class="table datatable-basic">
                <thead>
                <tr>
                    <th>Tên</th>
                    <th>Ảnh</th>
                    <th>Giá</th>
                    <th>Giá khuyến mại</th>
                    <th>Tổng</th>
                    <th>Tồn</th>
                    <th class="text-center">Chi tiết sp</th>
                </tr>
                </thead>
                <tbody>
                <?php if(!empty($data)): ?>
                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($item->name); ?></td>
                            <td><img src="<?php echo e(asset($item->avatar)); ?>" class="img-circle img-md"></td>
                            <td><?php echo e(number_format($item->price)); ?></td>
                            <td><?php echo e(number_format($item->price_discount)); ?></td>
                            <td>
                                <?php echo e($item->total); ?>

                            </td>
                            <td>
                                <?php echo e($item->total - $item->sold); ?>


                            </td>
                            <td class="text-center">
                                <a href="<?php echo e(route('products.view',$item->id)); ?>" class="btn btn-info" title="Xem"><i
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
<?php $__env->startSection('js'); ?>
    <script>
        $('.datepicker').datepicker();
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>