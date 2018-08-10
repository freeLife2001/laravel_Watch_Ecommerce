<div class="attr-nav">
    <ul>
        <li class="dropdown">
            <a href="<?php echo e(route('cart.cart')); ?>" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-shopping-bag"></i>
                <?php if(session('total')): ?>

                    <span class="badge"><?php echo e(count(session('total'))); ?></span>

                <?php endif; ?>

            </a>
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
        </li>
        <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
    </ul>
</div>