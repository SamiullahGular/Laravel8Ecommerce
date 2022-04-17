<div>
	<style>
		#delete-cart:hover{
			color: red;
		}
	</style>
	<!-- breadcrumb -->
	<div class="container p-t-30 mt-5">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="/" class="stext-109 cl8 hov-cl1 trans-04">
			Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
			Shoping Cart
			</span>
		</div>

		@php  $sub = 0;  $tot = 0; @endphp
	
		<!-- Shoping Cart -->
			<div class="container">
				<div class="row">
					<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
						<div class="m-l-25 m-r--38 m-lr-0-xl">
							<div class="wrap-table-shopping-cart">
								@if(Session::has('success_message'))
									<div class="alert alert-success">
										<strong>Success </strong>{{ Session::get('success_message')}}
									</div>
								@endif
								<table class="table-shopping-cart">
									<tr class="table_head">
										<th class="column-1">Product</th>
										<th class="column-2"></th>
										<th class="column-3">Price</th>
										<th class="column-4">Quantity</th>
										<th class="column-5">Total</th>
										<th class="column-6">Delete</th>
									</tr>
								@if(Cart::instance('cart')->count() > 0)
									@foreach(Cart::instance('cart')->content() as $item)
										<tr class="table_row">
											<td class="column-1">
												<div class="how-itemcart1">
													<img src="{{ asset('assets/images')}}/{{ $item->model->image }}" alt="{{ $item->model->name }}">
												</div>
											</td>
											<td class="column-2"><a href="{{ route('product.details', ['slug'=> $item->model->slug])}}">{{ $item->model->name }}</a></td>
											<td class="column-3">$ {{ $item->model->regular_price}}</td>
											<td class="column-4">
												<div class="wrap-num-product flex-w m-l-auto m-r-0">
													<a href="#" class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m" wire:click.prevent="decreaseQuantity('{{ $item->rowId }}')">
														<i class="fs-16 zmdi zmdi-minus"></i>
													</a> 

													<input class="mtext-104 cl3 txt-center num-product" type="text" name="num-product1" value="{{$item->qty}}">

													<a href="#" class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m" wire:click.prevent="increaseQuantity('{{ $item->rowId }}')">
														<i class="fs-16 zmdi zmdi-plus"></i>
													</a>
												</div>
												<p class="text-center" wire:click.prevent="switchToSaveForLater('{{$item->rowId}}')"><a href="#">Save For Later</a></p>
											</td>
											<td class="column-5">$ {{$item->subtotal}}</td>
											<td class="column-6">
												<a href="#" id="delete-cart" class="btn fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04" wire:click.prevent="destroy('{{ $item->rowId }}')">
													<i class="zmdi zmdi-close"></i>
												</a>
											</td>
										</tr>
									@php
										$sub += $item->subtotal;
										$tot += $item->total;
									@endphp

									@endforeach
								@else
									<p>No item in cart.</p>
								@endif
								</table>
							</div>

							<div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
							@if(!Session::has('coupon'))
								@if(Session::has('coupon_message'))
									<div class="alert alert-danger">{{ Session::get('coupon_message')}}</div>
								@endif
								<div class="flex-c-m size-119 bg8">
									<input type="checkbox" id="have-code" value="1" wire:model="haveCouponCode">&nbsp;<span>I have coupon code.</span>
								</div>
								
								@if($haveCouponCode == 1)
									<div class="flex-w flex-m m-r-20 m-tb-5">
										<input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-5 m-tb-5" wire:model="couponCode" type="text" placeholder="Coupon Code" wire:model='couponCode'>
											
										<button wire:submit.prevent='applyCouponCode' class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
											Apply coupon
										</button>
									</div>
								@endif
							@endif
								<div class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10" wire:click.prevent="destroyAll()">
									Clear Shipping Cart
								</div>
							</div>

							<div class="wrap-table-shopping-cart">
								<h3 class="title-box" style="border-bottom: 1px solid; padding: 15px;">{{Cart::instance('saveForLater')->count()}} item(s) Saved For Later</h3>
								@if(Session::has('s_success_message'))
									<div class="alert alert-success">
										<strong>Success </strong>{{ Session::get('s_success_message')}}
									</div>
								@endif
								<table class="table-shopping-cart">
									<tr class="table_head">
										<th class="column-1">Product</th>
										<th class="column-2"></th>
										<th class="column-3">Price</th>
										<th class="column-4">Quantity</th>
										<th class="column-5">Delete</th>
									</tr>
								@if(Cart::instance('saveForLater')->count() > 0)
									@foreach(Cart::instance('saveForLater')->content() as $item)
										<tr class="table_row">
											<td class="column-1">
												<div class="how-itemcart1">
													<img src="{{ asset('assets/images')}}/{{ $item->model->image }}" alt="{{ $item->model->name }}">
												</div>
											</td>
											<td class="column-2"><a href="{{ route('product.details', ['slug'=> $item->model->slug])}}">{{ $item->model->name }}</a></td>
											<td class="column-3">$ {{ $item->model->regular_price}}</td>
											<td class="column-4">
												<p class="text-center"><a href="#" wire:click.prevent="moveToCart('{{$item->rowId}}')">Move to Cart</a></p>
											</td>
											<td class="column-5">
												<a href="#" id="delete-cart" class="btn fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04" wire:click.prevent="deleteFromSaveForLater('{{ $item->rowId }}')">
													<i class="zmdi zmdi-close"></i>
												</a>
											</td>
										</tr>
									@endforeach
								@else
									<p>No item saved for later.</p>
								@endif
								</table>
							</div>
						</div>
					</div>

					<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
						@if(Cart::instance('cart')->count() > 0)
						<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
							<h4 class="mtext-109 cl2 p-b-30">
							Cart Totals 
							</h4>

							<div class="flex-w flex-t bor12 p-b-13">
								<div class="size-208">
									<span class="stext-110 cl2">
									Subtotal:
									</span>
								</div>

								<div class="size-209">
									<span class="mtext-110 cl2">
									${{$sub}}
									</span>
								</div>
							</div>
							@if(Session::has('coupon'))
								<div class="flex-w flex-t bor12 p-t-15 p-b-30">
									<div class="size-208 w-full-ssm">
										<span class="stext-110 cl2">
										Discount ({{Session::get('coupon')['code']}})
										</span>
									</div>

									<div class="size-209">
										<span class="mtext-110 cl2">
										${{$discount}}
										</span>
									</div>
								</div>

								<div class="flex-w flex-t bor12 p-t-15 p-b-30">
									<div class="size-208 w-full-ssm">
										<span class="stext-110 cl2">
										Subtotal with Discount:
										</span>
									</div>

									<div class="size-209">
										<span class="mtext-110 cl2">
										${{$subtotalAfterDiscount}}
										</span>
									</div>
								</div>

								<div class="flex-w flex-t bor12 p-t-15 p-b-30">
									<div class="size-208 w-full-ssm">
										<span class="stext-110 cl2">
										Tax ({{config('cart.tax')}}%)
										</span>
									</div>

									<div class="size-209">
										<span class="mtext-110 cl2">
										${{$taxAfterDiscount}}
										</span>
									</div>
								</div>

								<div class="flex-w flex-t p-t-27 p-b-33">
									<div class="size-208">
										<span class="mtext-101 cl2">
										Total:
										</span>
									</div>

									<div class="size-209 p-t-1">
										<span class="mtext-110 cl2">
										${{$totalAfterDiscount}}
										</span>
									</div>
								</div>
							@else
							<div class="flex-w flex-t bor12 p-t-15 p-b-30">
								<div class="size-208 w-full-ssm">
									<span class="stext-110 cl2">
									Tax:
									</span>
								</div>

								<div class="size-209">
									<span class="mtext-110 cl2">
									${{Cart::instance('cart')->tax()}}
									</span>
								</div>
							</div>

							<div class="flex-w flex-t p-t-27 p-b-33">
								<div class="size-208">
									<span class="mtext-101 cl2">
									Total:
									</span>
								</div>

								<div class="size-209 p-t-1">
									<span class="mtext-110 cl2">
									${{$tot}}
									</span>
								</div>
							</div>
							@endif

							<a href="{{ route('checkout') }}" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15" style="color:white">
							Proceed to Checkout
							</a>
						</div>
						@else
						<div class="text-center" style="padding: 30px 0;">
							<h1>Your cart is empty!</h1>
							<p>Add items to is now</p>
							<a href="/shop" class="btn btn-success">Shop now</a>
						</div>
						@endif
					</div>
				</div>
			</div>
	</div>
</div>