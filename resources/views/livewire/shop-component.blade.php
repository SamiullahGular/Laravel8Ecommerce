<div>
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
				All Products
			</span>
		</div>
	</div>

    <div class="bg0 m-t-23 p-b-70">
		<div class="container">
			<div class="flex-w flex-sb-m p-b-52">
				<div class="container">
					<!-- Price Filter -->
					<span class="filter-col4 p-b-27">
						<div class="mtext-102 cl2 p-b-15">
							Price
							&nbsp;<span class="text-info">${{$min_price}} - ${{$max_price}}</span>
							
							<span class="col-xl-3 flex-w m-tb-10 float-right" style="margin-top: 30px;">
								<div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
									<i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
									<i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
										Filter
								</div>
								<div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
									<i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
									<i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
										Search
								</div>
							</span>
						</div>
						
						<div id="slider" style="max-width: 740px; margin-left: 20px;" wire:ignore></div>
					</span>
				</div>

				<!-- Search product -->
				<div class="dis-none panel-search w-full p-t-10 p-b-15">
					<div class="bor8 dis-flex p-l-15">
						<button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
							<i class="zmdi zmdi-search"></i>
						</button>

						<input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search-product" placeholder="Search" wire:keydown.enter="keyWore($event.target.value)">
					</div>	
				</div>

				<!-- Filter -->
				<div class="dis-none panel-filter w-full p-t-10">
					<div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
						<div class="filter-col1 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Sort By
							</div>

							<ul>
								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04 filter-link-active" wire:click.prevent="sortby('default')">
										Default
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04 " wire:click.prevent="sortby('newness')">
										Newness
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04 " wire:click.prevent="sortby('price')">
										Price: Low to High
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04 " wire:click.prevent="sortby('price-desc')">
										Price: High to Low
									</a>
								</li>
							</ul>
						</div>

						<div class="filter-col2 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Categories
							</div>

							<ul>
								<li class="p-b-6">
									<a href="/shop" class="filter-link stext-106 trans-04 filter-link-active">
										All Categories
									</a>
								</li>
								@foreach($categories as $category)
								<li class="p-b-6">
									<a href="{{ route('product.category', ['category_slug'=> $category->slug ]) }}" class="filter-link stext-106 trans-04">
										{{$category->name}}
									</a>
								</li>
								@endforeach
							</ul>
						</div>

						<div class="filter-col3 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Color
							</div>

							<ul>
								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #222;">
										<i class="zmdi zmdi-circle"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04">
										Black
									</a>
								</li>

								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #4272d7;">
										<i class="zmdi zmdi-circle"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04 filter-link-active">
										Blue
									</a>
								</li>

								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #b3b3b3;">
										<i class="zmdi zmdi-circle"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04">
										Grey
									</a>
								</li>

								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #00ad5f;">
										<i class="zmdi zmdi-circle"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04">
										Green
									</a>
								</li>

								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #fa4251;">
										<i class="zmdi zmdi-circle"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04">
										Red
									</a>
								</li>

								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #aaa;">
										<i class="zmdi zmdi-circle-o"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04">
										White
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		@if($products->count() > 0)
			<div class="row isotope-grid">
				@php
					$witems = Cart::instance('wishlist')->content()->pluck('id');
				@endphp
				@foreach($products as $product)
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
					<!-- Block2 -->
					<div class="block2">
						<div class="block2-pic hov-img0">
							<img src="{{ asset('assets/images')}}/{{ $product->image }}" alt="IMG-PRODUCT">

							<a href="{{ route('product.details', ['slug' => $product->slug ]) }}" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
								Quick View
							</a>
						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a href="{{ route('product.details', ['slug' => $product->slug ]) }}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
									{{ $product->name }}
								</a>

								<span class="stext-105 cl3">
									${{$product->regular_price}}
									<span>
										<a id="add-cart" href="#" class="btn btn-info btn-sm" wire:click.prevent="store({{$product->id}}, '{{$product->name}}', {{ $product->regular_price }})">ADD TO CART</a>
									</span>
								</span>
							</div>

							<div class="block2-txt-child2 flex-r p-t-3">
								@if($witems->contains( $product->id ))
								<a href="#" class="dis-block pos-relative" wire:click.prevent="removeFromWishlist({{ $product->id }})">
									<img class="icon-heart1 dis-block trans-04" wire:click.prevent="removeFromWishlist({{ $product->id }})" src="{{ asset('assets/images/icons/icon-heart-02.png') }}" alt="ICON">
								</a>
								@else
								<a href="#" class="dis-block pos-relative" wire:click.prevent="addToWishList({{$product->id}}, '{{$product->name}}', {{ $product->regular_price }})">
									<img class="icon-heart2 dis-block trans-04" src="{{ asset('assets/images/icons/icon-heart-01.png') }}" alt="ICON">
								</a>
								@endif
							</div>
						</div>
					</div>
				</div>
				@endforeach
			</div>
			<!-- Load more -->
			<div class="flex-c-m flex-w w-full p-t-45">
				{{ $products->links() }}
			</div>
		@else
			<div class="flex-c-m flex-w w-full p-t-45">
				<p>No product founded.</p>
			</div>
		@endif
		</div>
	</div>
</div>
@push('scripts')
	<script>
		var slider = document.getElementById('slider');
		noUiSlider.create(slider, {
			start : [1, 1000],
			connect:true,
			range: {
				'min' : 1,
				'max' : 1000
			},
			pips: {
				mode: 'steps',
				stepped:true,
				density:4
			}
		});

		slider.noUiSlider.on('update', function(value){
			@this.set('min_price', value[0]);
			@this.set('max_price', value[1]);
		});
	</script>
@endpush
