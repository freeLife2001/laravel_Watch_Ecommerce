<?php $__env->startSection('content'); ?>
    <!-- Main charts -->
    <!-- Main Slider -->
    <?php echo $__env->make('layouts.slider', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <!-- Product Carousel -->
    <section class="product-carousel-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h2>Sản Phẩm <span>Mới</span></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="product-carousel-col">
                        <div class="product-carousel">
                            <?php if(!empty($new)): ?>
                                <?php $__currentLoopData = $new; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="item">
                                        <a href="<?php echo e(route('home.view',$item['id'])); ?>">
                                            <img src="<?php echo e(asset($item['avatar'])); ?>" class="img-responsive center-block" alt="">
                                        </a>
                                        <h4 class="text-center">
                                            <p><?php echo e(number_format($item['price'])); ?>vnđ</p>
                                        </h4>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Discount Start -->
    <section class="discount-section">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <div class="discount-col">
                        <h2>Sản phẩm giảm giá <span>(lên đến 50%)</span></h2>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-md-6 col-sm-12">
                    <div class="discount-col">
                        <a href="<?php echo e(route('home.view',$item['id'])); ?>"><img src="<?php echo e(asset($discount_big['avatar'])); ?>" alt=""></a>
                        <div class="discounted-price">
                            <p><span><?php echo e(number_format($discount_big['price'])); ?> vnđ</span> (còn <?php echo e(number_format($discount_big['price_discount'])); ?> vnđ) </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="row">
                        <?php if(!empty($discount)): ?>
                            <?php $__currentLoopData = $discount; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-6 col-sm-6">
                                    <div class="discount-col">
                                        <a href="<?php echo e(route('home.view',$item['id'])); ?>"><img src="<?php echo e(asset($item['avatar'])); ?>" alt=""></a>
                                        <div class="discounted-price">
                                            <p><span><?php echo e(number_format($item['price'])); ?> vnđ</span> (còn <?php echo e(number_format($item['price_discount'])); ?> vnđ) </p>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Separator Start -->
    <?php echo $__env->make('layouts.separator', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <!-- Men's Shopping Start -->
    <section class="men-shopping">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h2>Sản Phẩm <span>Bán Chạy</span></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php if(!empty($best_sell)): ?>
                    <?php $__currentLoopData = $best_sell; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-3 col-sm-6 col-xs-6 full-wd-600">
                            <div class="shopping-col">
                                <div class="product-img">
                                    <a href="<?php echo e(route('home.view',$item['id'])); ?>"><img src="<?php echo e(asset($item['avatar'])); ?>" alt=""></a>
                                    <div class="product-over-box">
                                        <form action="<?php echo e(route('cart.create')); ?>" method="post">
                                            <?php echo e(csrf_field()); ?>

                                            <input type="hidden" name="product_id" value="<?php echo e($item['id']); ?>">
                                            <button type="submit"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i>Thêm vào giỏ</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="product-info text-center">
                                    <h4><a href="<?php echo e(route('home.view',$item['id'])); ?>"><?php echo e($item['name']); ?></a></h4>
                                    <p><?php echo e(number_format($item['price'])); ?> vnđ</p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <!-- Blog Start -->
    <section class="blog-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h2>THÔNG TIN <span>HỮU ÍCH</span></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php if(!empty($posts)): ?>
                    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-4 col-sm-4">
                            <div class="blog-col">
                                <div class="blog-img">
                                    <img src="<?php echo e(asset($item['avatar'])); ?>" alt="<?php echo e($item['name']); ?>">
                                    <div class="date">
                                        <p><?php echo e(date('d/m/Y H:i:s',strtotime($item['created_at']))); ?></p>
                                    </div>
                                    <div class="overlay-top"></div>
                                    <div class="blog-info-box">
                                        <ul>
                                            <li><i class="fa fa-user" aria-hidden="true"></i> <a href="#"><?php echo e($item['user_create']); ?></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <h3><a href="<?php echo e(route('post.view',$item['id'])); ?>"><?php echo e($item['name']); ?></a></h3>
                                <?php echo $item['summary']; ?>

                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>

            </div>
        </div>
    </section>

    <!-- Partner Start -->
    <section class="partner-area">
        <div class="container">
            <div class="row">
                
                    
                        
                            
                                
                                
                            
                        
                    
                
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.shop', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>