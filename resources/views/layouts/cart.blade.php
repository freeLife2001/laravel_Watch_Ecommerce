<div class="attr-nav">
    <ul>
        <li class="dropdown">
            <a href="{{route('cart.cart')}}" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-shopping-bag"></i>
                @if (session('total'))

                    <span class="badge">{{count(session('total'))}}</span>

                @endif

            </a>
            {{--<ul class="dropdown-menu cart-list">--}}
            {{--<li>--}}
            {{--<a href="#" class="photo"><img src="images/thumb/1.jpg" class="cart-thumb" alt="" /></a>--}}
            {{--<h6><a href="#">Delica omtantur </a></h6>--}}
            {{--<p>2x - <span class="price">$99.99</span></p>--}}
            {{--</li>--}}
            {{--<li>--}}
            {{--<a href="#" class="photo"><img src="images/thumb/2.jpg" class="cart-thumb" alt="" /></a>--}}
            {{--<h6><a href="#">Omnes ocurreret</a></h6>--}}
            {{--<p>1x - <span class="price">$33.33</span></p>--}}
            {{--</li>--}}
            {{--<li>--}}
            {{--<a href="#" class="photo"><img src="images/thumb/3.jpg" class="cart-thumb" alt="" /></a>--}}
            {{--<h6><a href="#">Agam facilisis</a></h6>--}}
            {{--<p>2x - <span class="price">$99.99</span></p>--}}
            {{--</li>--}}
            {{--<li class="total">--}}
            {{--<span class="pull-right"><strong>Total</strong>: $0.00</span>--}}
            {{--<a href="#" class="btn btn-default btn-cart">Cart</a>--}}
            {{--</li>--}}
            {{--</ul>--}}
        </li>
        <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
    </ul>
</div>