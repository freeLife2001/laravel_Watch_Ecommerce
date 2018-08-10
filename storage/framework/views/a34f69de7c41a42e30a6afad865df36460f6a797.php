<?php $__env->startSection('content'); ?>
    <!-- Main charts -->
    <!-- Main Slider -->

    <section class="men-shopping">
        <div class="container">
            <div class="row">
                <?php if(count($product_list)>0): ?>
                    <div class="col-md-12">
                        <?php echo $__env->make('layouts.flash_message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <h4>Tổng số: <?php echo e(count($product_list)); ?> sản phẩm</h4>
                    </div>
                    <?php $__currentLoopData = $product_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-3 col-sm-6 col-xs-6 full-wd-600">
                            <div class="shopping-col">
                                <div class="product-img">
                                    <a href="<?php echo e(route('home.view',['id'=>$item->product_id,'slug'=>str_slug($item->name)])); ?>"><img
                                                src="<?php echo e(asset($item->avatar)); ?>" alt=""></a>
                                    <div class="product-over-box">
                                        <form action="<?php echo e(route('cart.create')); ?>" method="post">
                                            <?php echo e(csrf_field()); ?>

                                            <input type="hidden" name="product_id" value="<?php echo e($item->product_id); ?>">
                                            <button type="submit"><i class="fa fa-cart-arrow-down"
                                                                     aria-hidden="true"></i>Thêm vào giỏ
                                            </button>
                                        </form>
                                        
                                    </div>
                                </div>
                                <div class="product-info text-center">
                                    <h4>
                                        <a href="<?php echo e(route('home.view',['id'=>$item->product_id,'slug'=>str_slug($item->name)])); ?>"><?php echo e($item->name); ?></a>
                                    </h4>
                                    <p>
                                        <del><?php echo e(number_format($item->price)); ?>vnđ
                                        </del> <?php echo e(number_format($item->price_discount)); ?>vnđ
                                    </p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <h4>Không có sản phẩm cần tìm !</h4>
                <?php endif; ?>
            </div>
        </div>
        <!-- Pagination -->
        <div class="page-pagination">
            <?php echo e($product_list->links()); ?>

        </div>
    </section>

    <?php echo $__env->make('layouts.separator', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.shop', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>