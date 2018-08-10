<?php $__env->startSection('content'); ?>
<section class="blog-area blog-area-inner">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-8">
                <div class="blog-col blog-single-col">
                    <div class="blog-img">
                        <img src="<?php echo e(asset($data['avatar'])); ?>" alt="">
                        <div class="overlay-top"></div>
                        <div class="blog-info-box blog-info-box-two">
                            <ul>
                                <li><i class="fa fa-user" aria-hidden="true"></i> <a href="#"><?php echo e($data['user_create']); ?></a></li>
                                <li><i class="fa fa-calendar" aria-hidden="true"></i> <a href="#"><?php echo e(date('d/m/Y',strtotime($data['created_at']))); ?></a></li>
                            </ul>
                        </div>
                    </div>
                    <h3><a href="#"><?php echo e($data['name']); ?></a></h3>
                    <?php echo $data['body']; ?>

                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="blog-col blog-sidebar-col">
                    <div class="sidebar-post">
                        <div class="sidebar-title">
                            <h3>Bài Viết Khác</h3>
                        </div>
                        <ul>
                            <?php if(!empty($post_list)): ?>
                                <?php $__currentLoopData = $post_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <img src="<?php echo e(asset($item['avatar'])); ?>" alt="<?php echo e($data['name']); ?>">
                                        <h4><a href="<?php echo e(route('post.view',$item['id'])); ?>"><?php echo e($item['name']); ?></a></h4>
                                        <p><?php echo e(date('d/m/Y',strtotime($item['created_at']))); ?></p>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.shop', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>