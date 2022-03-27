@if(Cart::instance('wishlist')->count() > 0)
	<a href="{{ route('product.wishlist') }}" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti"  data-notify="{{ Cart::instance('wishlist')->count() }}">
@else
	<a href="{{ route('product.wishlist') }}" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti"  data-notify="0">
@endif
		<i class="zmdi zmdi-favorite-outline"></i>
	</a>
