<?php $__env->startSection('content'); ?>
    <!-- Main charts -->
    <div class="row">
        <div class="col-lg-7">

            <!-- Traffic sources -->
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h6 class="panel-title"><a href="<?php echo e(route('bill.index')); ?>">Đơn hàng (<?php echo e($total_bill); ?>)</a></h6>
                </div>

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-4">
                            <ul class="list-inline text-center">
                                <li>
                                    <a href="#" class="btn border-teal text-teal btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-plus3"></i></a>
                                </li>
                                <li class="text-left">
                                    <div class="text-semibold">Đơn Chưa Xác Nhận</div>
                                    <div class="text-muted"><?php echo e($total_bill_0); ?></div>
                                </li>
                            </ul>

                            <div class="col-lg-10 col-lg-offset-1">
                                <div class="content-group" id="new-visitors"></div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <ul class="list-inline text-center">
                                <li>
                                    <a href="#" class="btn border-warning-400 text-warning-400 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-watch2"></i></a>
                                </li>
                                <li class="text-left">
                                    <div class="text-semibold">Đơn Đã Xác Nhận</div>
                                    <div class="text-muted"><?php echo e($total_bill_1); ?></div>
                                </li>
                            </ul>

                            <div class="col-lg-10 col-lg-offset-1">
                                <div class="content-group" id="new-sessions"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="position-relative" id="traffic-sources"></div>
            </div>
            <!-- /traffic sources -->
        </div>
    </div>
    <!-- /main charts -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>