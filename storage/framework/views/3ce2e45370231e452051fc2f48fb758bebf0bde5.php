<?php $__env->startSection('content'); ?>
    <!-- Main charts -->
    <!-- Main Slider -->

    <section class="product-details-area">
        <div class="container">
            <div class="row">
                <?php echo $__env->make('layouts.flash_message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <div class="col-md-4 col-sm-4">
                    <div class="product-details-col">
                        <div id="myCarousel" class="carousel slide my-product-carousel" data-ride="carousel">
                            <!-- Wrapper for slides -->
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img src="<?php echo e(asset($product['avatar'])); ?>" alt="">
                                </div><!-- End Item -->
                            </div><!-- End Carousel Inner -->

                        </div><!-- End Carousel -->
                    </div>
                </div>
                <div class="col-md-8 col-sm-8">
                    <div class="product-details-col">
                        <h3><?php echo e($product['name']); ?></h3>
                        <div class="review">
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star-o" aria-hidden="true"></i>
                            <a href="#">(12)</a>
                        </div>
                        <h2><?php echo e(number_format($product['price_discount'])); ?> vnđ
                            <del> <?php echo e(number_format($product['price'])); ?> vnđ</del>
                        </h2>
                        <p>Mã sp:TH-<?php echo e($product['id']); ?></p>
                        <p>
                            <i class="glyphicon glyphicon-list"></i> Danh mục:
                            <?php if($category_list): ?>
                                <?php $__currentLoopData = $category_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a href="<?php echo e(route('home.product_category',['id'=>$item['id'],'slug'=>str_slug($item['name'])])); ?>"><?php echo e($item['name']); ?></a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </p>
                        <p class="hide">
                            <i class="glyphicon glyphicon-tags"></i> Tag:
                            <?php if($tag_list): ?>
                                <?php $__currentLoopData = $tag_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a href="<?php echo e(route('home.product_tag',$item['id'])); ?>"><?php echo e($item['name']); ?></a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </p>
                        <p>Mã sp:TH-<?php echo e($product['id']); ?></p>
                        <p class="warning">Đã bán: <?php echo e($product['sold']); ?> sản phẩm</p>
                        <p class="warning">Chỉ còn: <?php echo e($product['total']-$product['sold']); ?> sản phẩm</p>
                        <div>
                            <?php echo $product['contents']; ?>

                        </div>
                        <div class="product-action">
                            <form action="<?php echo e(route('cart.create')); ?>" method="post">
                                <?php echo e(csrf_field()); ?>

                                <input type="hidden" name="product_id" value="<?php echo e($product['id']); ?>">
                                <button type="submit"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i>Thêm vào
                                    giỏ
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php echo $__env->make('layouts.separator', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.shop', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>