<?php $__env->startSection('bercum'); ?>
    <a href="#"></i> Thống kê bán hàng</a>
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
        
        <div class="panel panel-flat">
            <div class="panel-body">
                <form method="post" action="<?php echo e(route('report.sold_search')); ?>">
                    <?php echo e(csrf_field()); ?>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Khoảng thời gian</label>
                                <select name="type" class="form-control">
                                    <option value="0">Tự chọn</option>
                                    <option value="1">1 tuần</option>
                                    <option value="2">1 tháng</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Ngày bắt đầu <span class="text-danger">*</span></label>
                                <input type="text" class="form-control datepicker" placeholder="dd-mm-yyyy" name="from_date" value="<?php echo e(date('d-m-Y',strtotime($from_date))); ?>">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Ngày kết thúc <span class="text-danger">*</span></label>
                                <input type="text" class="form-control datepicker" placeholder="dd-mm-yyyy" name="to_date" value="<?php echo e(date('d-m-Y',strtotime($to_date))); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Thống kê <i class="icon-search4 position-right"></i></button>
                    </div>
                </form>
            </div>
        </div>
        <!-- Basic datatable -->
        <div class="panel panel-flat">
            <div class="col-md-12">
                <h3><?php echo $mess; ?></h3>
            </div>
            <table class="table datatable-basic">
                <thead>
                <tr>
                    <th>Stt</th>
                    <th>Tên</th>
                    <th>Ảnh</th>
                    <th>Giá</th>
                    <th>Giá khuyến mại</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                    <th>Người mua</th>
                    <th>Đơn hàng</th>
                    <th class="text-center">Chi tiết sản phẩm</th>
                </tr>
                </thead>
                <tbody>
                <?php if(!empty($data)): ?>
                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($key+1); ?></td>
                            <td><?php echo e($item['name']); ?></td>
                            <td><img src="<?php echo e(asset($item['avatar'])); ?>" class="img-circle img-md"></td>
                            <td><?php echo e(number_format($item['price'])); ?></td>
                            <td><?php echo e(number_format($item['price_discount'])); ?></td>
                            <td><?php echo e($item['product_total_bill']); ?></td>
                            <td><?php echo e(number_format($item['product_value_bill'])); ?></td>
                            <td><?php echo e($item['buyer']); ?></td>
                            <td>
                                <a href="<?php echo e(route('bill.view',$item['bill_id'])); ?>" class="btn btn-info" title="Xem"><?php echo e($item['bill_name']); ?></a>
                            </td>
                            <td class="text-center">
                                <a href="<?php echo e(route('products.view',$item['id'])); ?>" class="btn btn-info" title="Xem"><i class="icon-eye4"></i></a>
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