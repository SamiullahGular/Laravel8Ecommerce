<div class="p-b-60">
	<!-- breadcrumb -->
	<div class="container p-t-30 mt-5">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="/" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<a href="/shop" class="stext-109 cl8 hov-cl1 trans-04">
				Shop
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				Wishlist
			</span>
		</div>
	</div>

	<div class="container bg0 m-t-23">
		<div class="row isotope-grid">
			@php
				$witems = Cart::instance('wishlist')->content()->pluck('id');
			@endphp

			@if(Cart::instance('wishlist')->content()->count() > 0)
				@foreach(Cart::instance('wishlist')->content() as $item)
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
					<!-- Block2 -->
					<div class="block2">
						<div class="block2-pic hov-img0">
							<img src="{{ asset('assets/images')}}/{{ $item->model->image }}" alt="IMG-PRODUCT">

							<a href="{{ route('product.details', ['slug' => $item->model->slug ]) }}" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
								Quick View
							</a>
						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a href="{{ route('product.details', ['slug' => $item->model->slug ]) }}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
									{{ $item->model->name }}
								</a>

								<span class="stext-105 cl3">
									${{$item->model->regular_price}}

									<span>
										<a id="add-cart" href="#" class="btn btn-info btn-sm" wire:click.prevent="moveProductFromWishlistToCart('{{$item->rowId}}')">MOVE TO CART</a>
									</span>
								</span>
							</div>

							<div class="block2-txt-child2 flex-r p-t-3">
							@if($witems->contains( $item->model->id ))
								<a href="#" class="dis-block pos-relative" wire:click.prevent="removeFromWishlist({{ $item->model->id }})">
									<img class="icon-heart1 dis-block trans-04" src="{{ asset('assets/images/icons/icon-heart-02.png') }}" alt="ICON">
								</a>
							@endif
							</div>
						</div>
					</div>
				</div>
				@endforeach
			@else
				<h4>No items in Wishlist</h4>
			@endif
		</div>
	</div>
</div>
