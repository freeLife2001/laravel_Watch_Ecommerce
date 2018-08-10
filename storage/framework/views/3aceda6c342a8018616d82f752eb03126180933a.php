<?php $__env->startSection('content'); ?>
    <!-- Main charts -->
    <!-- Main Slider -->
    <?php echo $__env->make('layouts.separator', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <section class="men-shopping">
        <div class="container">
            <div class="row">
                <?php if(count($product_list)>0): ?>
                    <div class="col-md-12">
                        <?php echo $__env->make('layouts.flash_message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <h4>Tổng số: <?php echo e(count($product_list)); ?> bài viết</h4>
                    </div>
                    <?php $__currentLoopData = $product_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                <?php else: ?>
                    <h4>Không có bài viết cần tìm !</h4>
                <?php endif; ?>
            </div>
        </div>
        <!-- Pagination -->
        <div class="page-pagination">
            <?php echo e($product_list->links()); ?>

        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.shop', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>