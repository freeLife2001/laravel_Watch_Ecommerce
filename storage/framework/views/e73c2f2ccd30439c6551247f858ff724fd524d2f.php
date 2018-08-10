<ul class="navigation navigation-main navigation-accordion">

    <!-- Main -->
    <li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
    <li><a href="<?php echo e(route('admin.index')); ?>"><i class="icon-home4"></i> <span>Trang chủ</span></a></li>
    <?php if(Auth::user()->role_id==1): ?>
        <li>
            <a href="#"><i class="icon-magazine"></i> <span>Bài viết</span></a>
            <ul>

                <li><a href="<?php echo e(route('posts.create')); ?>">Tạo mới</a></li>
                <li class="navigation-divider"></li>
                <li><a href="<?php echo e(route('posts.index')); ?>">Danh sách</a></li>
            </ul>
        </li>
        <li>
            <a href="#"><i class="icon-gift"></i> <span>Sản phẩm</span></a>
            <ul>

                <li><a href="<?php echo e(route('products.create')); ?>">Tạo mới</a></li>
                <li class="navigation-divider"></li>
                <li><a href="<?php echo e(route('products.index')); ?>">Danh sách</a></li>
            </ul>
        </li>
        <li>
            <a href="#"><i class="icon-menu2"></i> <span>Chuyên mục</span></a>
            <ul>

                <li><a href="<?php echo e(route('category.create')); ?>">Tạo mới</a></li>
                <li class="navigation-divider"></li>
                <li><a href="<?php echo e(route('category.index')); ?>">Danh sách</a></li>
            </ul>
        </li>
        <li>
            <a href="#"><i class="icon-clipboard3"></i> <span>Đơn hàng</span></a>
            <ul>
                <li><a href="<?php echo e(route('bill.index')); ?>">Danh sách</a></li>
            </ul>
        </li>
        <li>
            <a href="#"><i class="icon-users4"></i> <span>Người dùng</span></a>
            <ul>

                <li><a href="<?php echo e(route('users.create')); ?>">Tạo mới</a></li>
                <li class="navigation-divider"></li>
                <li><a href="<?php echo e(route('users.index')); ?>">Danh sách</a></li>
            </ul>
        </li>
        <li>
            <a href="#"><i class="icon-file-stats"></i> <span>Báo cáo / Thống kê</span></a>
            <ul>

                <li><a href="<?php echo e(route('report.index')); ?>">Tồn kho</a></li>
                <li class="navigation-divider"></li>
                <li><a href="<?php echo e(route('report.sold')); ?>">Đã bán</a></li>
            </ul>
        </li>
    <?php endif; ?>
    <?php if(Auth::user()->role_id==0): ?>
        <li>
            <a href="#"><i class="icon-clipboard3"></i> <span>Đơn hàng</span></a>
            <ul>
                <li><a href="<?php echo e(route('bill.index')); ?>">Danh sách</a></li>
            </ul>
        </li>
    <?php endif; ?>
</ul>