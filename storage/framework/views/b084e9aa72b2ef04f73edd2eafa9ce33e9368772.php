<?php $__env->startSection('bercum'); ?>
    <a href="<?php echo e(route('users.create')); ?>">Tạo người dùng</a>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <!-- Square thumbs -->
    <h6 class="content-group text-semibold">
        Thêm người dùng
    </h6>

    <div class="row">
        <div class="col-md-12">
            <?php echo $__env->make('layouts.flash_message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
        <div class="col-lg-12" style="margin-bottom: 10px">
            <div class="panel panel-flat">
                <form class="panel-body" method="post">
                    <?php echo e(csrf_field()); ?>

                    <div class="form-group form-group-material">
                        <label class="display-block has-margin">Tên người dùng <span
                                    class="text-danger">*</span></label>
                        <input type="text" class="form-control typeahead-basic" name="name">
                    </div>
                    <div class="form-group form-group-material">
                        <label class="display-block has-margin">Mật Khẩu <span class="text-danger">*</span></label>
                        <input type="password" class="form-control typeahead-basic" name="password">
                    </div>
                    <div class="form-group form-group-material">
                        <label class="display-block has-margin">Nhập lại mật khẩu <span
                                    class="text-danger">*</span></label>
                        <input type="password" class="form-control typeahead-basic" name="repassword">
                    </div>
                    <div class="form-group form-group-material">
                        <label class="display-block has-margin">Email <span class="text-danger">*</span></label>
                        <input type="text" class="form-control typeahead-basic" name="email">
                    </div>
                    <div class="form-group form-group-material">
                        <label class="display-block has-margin">Số điện thoại <span class="text-danger">*</span></label>
                        <input type="text" class="form-control typeahead-basic" name="phone">
                    </div>
                    <div class="form-group form-group-material">
                        <label class="display-block has-margin">Địa chỉ</label>
                        <input type="text" class="form-control typeahead-basic" name="address">
                    </div>
                    <div class="form-group form-group-material">
                        <label class="display-block has-margin">Quyền <span class="text-danger">*</span></label>
                        <select name="role_id" class="form-control typeahead-basic">
                            <option value="1">Admin</option>
                            <option value="0">Khách hàng</option>
                        </select>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Tạo<i
                                    class="icon-arrow-right14 position-right"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>