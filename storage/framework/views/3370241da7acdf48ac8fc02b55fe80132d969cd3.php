<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Scripts -->
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link rel="stylesheet" href="<?php echo e(asset('bazar/css/bootstrap.min.css')); ?>">

    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('bazar/css/style.css')); ?>">

    <!-- Responsive stylesheet  -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('bazar/css/responsive.css')); ?>">
    <script src="<?php echo e(asset('bazar/js/html5shiv.js')); ?>"></script>
    <script src="<?php echo e(asset('bazar/js/respond.min.js')); ?>"></script>
    <?php echo $__env->yieldContent('css'); ?>

</head>

<body>

<!-- Preloader -->
<div id="preloader">
    <div id="status"></div>
</div>

<!-- Main Header Start -->
<header class="main-herader">
    <!-- Header top start -->
    <div class="header-topbar">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-3 col-sm-3">
                    <div class="header-topbar-col center767">
                        <p>Hotline: +123 012 034 056</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-3">
                    <div class="header-topbar-col center767">
                        <p><i class="fa fa-envelope-o" aria-hidden="true"></i> <a href="#">info@yourmail.com</a>
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-lg-offset-4 col-md-6 col-sm-6">
                    <div class="header-topbar-col text-right topbar-account clearfix center767">

                        <?php if(Auth::user()): ?>
                            <div class="dropdown pull-right">
                                <a href="#" data-toggle="dropdown"><?php echo e(Auth::user()->name); ?>

                                    <i class="caret"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a style="text-align: left" href="<?php echo e(route('logout')); ?>"
                                           onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i
                                                    class="glyphicon glyphicon-log-out"></i> Đăng xuất</a></li>
                                    <li><a style="text-align: left" href="<?php echo e(route('admin.index')); ?>"><i
                                                    class="fa fa-user"></i>Quản trị</a></li>
                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST"
                                          style="display: none;">
                                        <?php echo csrf_field(); ?>
                                    </form>
                                </ul>
                            </div>
                        <?php else: ?>
                            <a href="<?php echo e(route('login')); ?>">Đăng nhập</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header top end -->

    <!-- Start Navigation -->
    <nav class="navbar navbar-default bootsnav" id="navbar-main">
        <!-- Start Top Search -->
        <div class="top-search">
            <div class="container">
                <form method="post" action="<?php echo e(route('home.search')); ?>">
                    <?php echo e(csrf_field()); ?>

                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-search"></i></span>
                        <input type="text" class="form-control" placeholder="Tìm kiếm sản phẩm" name="key_word">
                        <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
                    </div>
                </form>
            </div>
        </div>
        <!-- End Top Search -->
        <div class="container">
            <!-- Start Atribute Navigation -->
        <?php echo $__env->make('layouts.cart', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <!-- End Atribute Navigation -->

            <!-- Start Header Navigation -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                    <i class="fa fa-bars"></i>
                </button>
                
            </div>
            <!-- End Header Navigation -->

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-menu">
                <?php
                $categories = \App\Models\Category::where('type', 0)->get();
                ?>
                <ul class="nav navbar-nav navbar-right" data-in="fadeInUp" data-out="fadeOutDown">
                    <li class="<?php echo e(url()->current()==route('home') ? 'active' : ''); ?>"><a href="<?php echo e(route('home')); ?>">Trang
                            chủ</a></li>

                    <?php if(!empty($categories)): ?>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="<?php echo e(url()->current() == route('home.product_category',['id' => $category->id,'slug'=>str_slug($category->name)])  ? 'active' : ''); ?>">
                                <a href="<?php echo e(route('home.product_category',['id' => $category->id,'slug'=>str_slug($category->name)])); ?>"><?php echo e($category->name); ?></a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>

                    <li class="<?php echo e(url()->current() == route('home.blog') ? 'active' : ''); ?>"><a href="<?php echo e(route('home.blog')); ?>">Tin tức</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div>
    </nav>
    <!-- End Navigation -->
</header>
<?php echo $__env->yieldContent('content'); ?>
<footer class="main-footer">
    <div class="inside-bgc-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="footer-col">
                        <h3>Thông tin cửa hàng</h3>
                        <p class="top-para">Web đồng hồ là một thương hiệu uy tín chuyên cung cấp các sản phẩm chính
                            hãng, tốt nhất trên thị trường.</p>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="footer-col">
                        <h3>Địa chỉ</h3>
                        <ul>
                            <li><a href="javascript:void(0)"><i class="glyphicon glyphicon-map-marker"></i> Hà Nội, Việt
                                    Nam</a></li>
                            <li><a href="javascript:void(0)"><i class="glyphicon glyphicon-earphone"></i> 0999999999</a>
                            </li>
                            <li><a href="javascript:void(0)"><i class="glyphicon glyphicon-globe"></i> dongho.local</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="footer-col">
                        <h3>Danh mục</h3>
                        <ul>
                            <?php if(!empty($categories)): ?>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <a href="<?php echo e(route('home.product_category',['id' => $category->id,'slug'=>str_slug($category->name)])); ?>">
                                            <?php echo e($category->name); ?></a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="footer-col">
                        <h3>Hỗ trợ khách hàng</h3>
                        <ul>
                            <li><a href="javascript:void(0)"> Chính sách bảo hành</a></li>
                            <li><a href="javascript:void(0)"> Chính sách đổi trả hàng</a></li>
                            <li><a href="javascript:void(0)"> Chính sách bảo mật</a></li>
                            <li><a href="javascript:void(0)"> Phương thức vận chuyển</a></li>
                            <li><a href="javascript:void(0)"> Cách thức thanh toán</a></li>
                            <li><a href="javascript:void(0)"> Hướng dẫn đặt hàng online</a></li>

                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
</footer>
<!-- Copyright Start -->
<section class="copyright-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="copyright-col text-center">
                    <div class="footer-sociai-group">
                        <a href="javascript:void(0)"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        <a href="javascript:void(0)"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        <a href="javascript:void(0)"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                        <a href="javascript:void(0)"><i class="fa fa-dribbble" aria-hidden="true"></i></a>
                        <a href="javascript:void(0)"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                    </div>
                    <p>©2018. Designed by <a href="javascript:void(0)">Administrator.</a> All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<a href="#" class="scrollup">
    <i class="fa fa-long-arrow-up" aria-hidden="true"></i>
</a>

<!-- modernizr -->
<script type="text/javascript" src="<?php echo e(asset('bazar/js/modernizr-2.6.2.min.js')); ?>"></script>

<!-- jQuery -->
<script type="text/javascript" src="<?php echo e(asset('bazar/js/jquery.min.js')); ?>"></script>

<!-- Bootstrap Core JavaScript -->
<script type="text/javascript" src="<?php echo e(asset('bazar/js/bootstrap.min.js')); ?>"></script>

<!-- all plugins and JavaScript -->
<script type="text/javascript" src="<?php echo e(asset('bazar/js/bootsnav.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('bazar/js/jquery.zoomslider.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('bazar/js/css3-animate-it.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('bazar/js/owl.carousel.min.js')); ?>"></script>

<!-- Main Custom JS -->
<script type="text/javascript" src="<?php echo e(asset('bazar/js/custom.js')); ?>"></script>
<?php echo $__env->yieldContent('js'); ?>
</body>
</html>
