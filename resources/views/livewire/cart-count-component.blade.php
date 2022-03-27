
@if(Cart::instance('cart')->count() > 0)
	<li class="label1" data-label1="{{Cart::instance('cart')->count()}}">
@else	
	<li>
@endif
	<a href="/cart">Cart</a>
    </li>
