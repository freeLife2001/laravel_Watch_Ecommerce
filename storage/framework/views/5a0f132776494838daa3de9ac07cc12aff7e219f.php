<?php $__env->startSection('content'); ?>
    <!-- Main charts -->
    <!-- Main Slider -->
    <?php
    $total = 0;
    $price = 0;
    $product_list = [];
    ?>

    <section class="cart-area">
        <div class="container">
            <div class="ror">

                <div class="col-md-12">
                    <?php echo $__env->make('layouts.flash_message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <h4>Thông tin giỏ hàng:</h4>
                    <?php if(count($data)==0): ?>
                        <h4>Chưa có sản phẩm trong giỏ của bạn !</h4>
                    <?php else: ?>
                        <div class="cart-col">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Tổng</th>
                                    <th>Xóa</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                    $price += $item->subtotal;
                                    $total += $item->qty;
                                    $product_list[$key]['id'] = $item->id;
                                    $product_list[$key]['price'] = $item->subtotal;
                                    $product_list[$key]['total'] = $item->qty;
                                    ?>
                                    <tr>
                                        <td>
                                            <div class="product-thumb">
                                                <a href="<?php echo e(route('home.view',['id'=>$item->id,'slug'=>str_slug($item->name)])); ?>">
                                                    <img src="<?php echo e(asset($item->options->avatar)); ?>" alt="<?php echo e($item->name); ?>">
                                                </a>
                                                <a href="<?php echo e(route('home.view',['id'=>$item->id,'slug'=>str_slug($item->name)])); ?>">
                                                    <?php echo e($item->name); ?>

                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            <p><?php echo e(number_format($item->price)); ?> vnđ</p>
                                            <p>
                                                <del> <?php echo e(number_format($item->options->price)); ?></del>
                                                vnđ
                                            </p>
                                        </td>
                                        <td>
                                            <select name="total" class="total" at="<?php echo e($item->rowId); ?>">
                                                <?php if($item->options->total>0): ?>
                                                    <?php for($i=1;$i<=$item->options->total;$i++): ?>
                                                        <option value="<?php echo e($i); ?>" <?php echo e($item->qty==$i ? 'selected' : ''); ?> ><?php echo e($i); ?></option>
                                                    <?php endfor; ?>
                                                <?php endif; ?>
                                            </select>
                                        </td>
                                        <td><?php echo e(number_format($item->subtotal)); ?></td>
                                        <td><a href="<?php echo e(route('cart.delete',$item->rowId)); ?>"><i
                                                        class="fa fa-window-close" aria-hidden="true"></i></a></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </tbody>
                            </table>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <!-- Shipping address Start -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Tổng Hóa Đơn</h3>
                        </div>
                        <div class="col-md-12">
                            <div class="shipping-col">
                                <ul>
                                    <li>Tiền hàng: <span class="pull-right"><?php echo e(number_format($price)); ?> vnđ</span></li>
                                    <li>Phí vận chuyển:<span class="pull-right">miễn phí</span></li>
                                    <li>Tổng:<span class="pull-right"><?php echo e(number_format($price)); ?> vnđ</span></li>
                                </ul>
                                <div class="text-right">
                                    <?php if(Auth::user()): ?>
                                        <form method="post" action="<?php echo e(route('cart.create_bill')); ?>">
                                            <?php echo e(csrf_field()); ?>

                                            <input type="text" hidden value="<?php echo e($total); ?>" name="total">
                                            <input type="text" hidden value="<?php echo e($price); ?>" name="price">
                                            <input type="text" hidden value="<?php echo e(json_encode($product_list)); ?>"
                                                   name="bill">
                                            <button class="btn btn-default" type="submit">Hoàn thành đặt hàng</button>
                                        </form>
                                    <?php else: ?>
                                        <a href="<?php echo e(route('login')); ?>">Đăng nhập để thanh toán</a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php echo $__env->make('layouts.separator', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script>
        $('.total').on('change', function () {
            var total = $(this).val();
            var id = $(this).attr('at');
            var url = '<?php echo e(route('cart.cart')); ?>' + '/cap-nhat-so-luong/' + id + '/' + total;
            console.log(url);
            if (id != null) {
                window.location.replace(url);
            }
        })
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.shop', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>