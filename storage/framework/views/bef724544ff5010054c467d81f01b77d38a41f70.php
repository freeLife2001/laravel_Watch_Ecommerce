<?php $__env->startSection('bercum'); ?>
    <a href="#"> Chi tiết đơn hàng</a>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <!-- Square thumbs -->
    <h6 class="content-group text-semibold">
        Chi tiết đơn hàng
    </h6>

    <div class="row">
        <div class="col-md-12">
            <?php echo $__env->make('layouts.flash_message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
        <div class="col-lg-12" style="margin-bottom: 10px">
            <div class="panel panel-flat">
                <div class="panel-body">
                    <div class="form-group form-group-material">
                        <label class="display-block has-margin">Tên đơn hàng</label>
                        <input type="text" class="form-control typeahead-basic" name="name" value="<?php echo e($bill['name']); ?>" disabled>
                    </div>
                    <div class="form-group form-group-material">
                        <label class="display-block has-margin">Người mua</label>
                        <input type="text" class="form-control typeahead-basic" name="name" value="<?php echo e($bill['buyer']); ?>" disabled>
                    </div>
                    <div class="form-group form-group-material">
                        <label class="display-block has-margin">Email</label>
                        <input type="text" class="form-control typeahead-basic" name="phone" value="<?php echo e($bill['email']); ?>" disabled>
                    </div>
                    <div class="form-group form-group-material">
                        <label class="display-block has-margin">Số điện thoại</label>
                        <input type="text" class="form-control typeahead-basic" name="phone" value="<?php echo e($bill['phone']); ?>" disabled>
                    </div>
                    <div class="form-group form-group-material">
                        <label class="display-block has-margin">Địa chỉ</label>
                        <input type="text" class="form-control typeahead-basic" name="address" value="<?php echo e($bill['address']); ?>" disabled>
                    </div>

                    <div class="form-group form-group-material">
                        <label class="display-block has-margin">Số lượng hàng</label>
                        <input type="text" class="form-control typeahead-basic" name="name" value="<?php echo e($bill['total']); ?>" disabled>
                    </div>
                    <div class="form-group form-group-material">
                        <label class="display-block has-margin">Tổng tiền</label>
                        <input type="text" class="form-control typeahead-basic" name="email" value="<?php echo e($bill['price']); ?>" disabled>
                    </div>
                    <div class="form-group form-group-material">
                        <label class="display-block has-margin">Trạng thái</label>
                        <input type="text" class="form-control typeahead-basic" name="email" value="<?php echo e($bill['status']==1?'Đã xác nhận':'Chờ xác nhận'); ?>" disabled>
                    </div>
                    <div class="form-group form-group-material">
                        <label class="display-block has-margin">Danh sách sản phẩm</label>
                        <table class="table table-bordered table-responsive">
                            <tr>
                                <td>Stt</td>
                                <td>Ảnh</td>
                                <td>Mã sản phẩm</td>
                                <td>Tên sản phẩm</td>
                                <td>Giá</td>
                            </tr>
                            <?php if(!empty($product_list)): ?>
                                <?php $__currentLoopData = $product_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($key+1); ?></td>
                                        <td><img src="<?php echo e(asset($item['avatar'])); ?>" class="img-circle img-md"></td>
                                        <td>TH-<?php echo e($item['id']); ?></td>
                                        <td><?php echo e($item['name']); ?></td>
                                        <td><?php echo e(number_format($item['price_discount'])); ?> vnđ ( <del><?php echo e($item['price']); ?></del> ) vnđ</td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>