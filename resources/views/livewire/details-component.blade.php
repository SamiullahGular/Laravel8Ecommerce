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
				{{ $single_product->name }}
			</span>
		</div>
	</div>
	
	<!-- Product Detail -->
	<section class="sec-product-detail bg0 p-t-65 p-b-60">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-lg-7 p-b-30">
					<div class="p-l-25 p-r-30 p-lr-0-lg">
						<div class="wrap-slick3 flex-sb flex-w" wire:ignore>
							<div class="wrap-slick3-dots"></div>
							<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

							<div class="slick3 gallery-lb">
								<div class="item-slick3" data-thumb="{{ asset('assets/images')}}/{{ $single_product->image }}">
									<div class="wrap-pic-w pos-relative">
										<img src="{{ asset('assets/images')}}/{{ $single_product->image }}" alt="IMG-PRODUCT">

										<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="{{ asset('assets/images')}}/{{ $single_product->image }}">
											<i class="fa fa-expand"></i>
										</a>
									</div>
								</div>
								@php
									$images = explode(',', $single_product->images)	
								@endphp
								@foreach($images as $image)
									<div class="item-slick3" data-thumb="{{ asset('assets/images')}}/{{$image}}">
										<div class="wrap-pic-w pos-relative">
											<img src="{{ asset('assets/images')}}/{{$image}}" alt="IMG-PRODUCT">

											<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="{{ asset('assets/images')}}/{{$image}}">
												<i class="fa fa-expand"></i>
											</a>
										</div>
									</div>
								@endforeach
							</div>
						</div>
					</div>
				</div>
					
				@php
					$avgrating = 0;	
				@endphp
				<div class="col-md-6 col-lg-5 p-b-30">
					<div class="p-r-50 p-t-5 p-lr-0-lg">
						<span class="fs-18 cl11">
							@foreach($single_product->orderItems->where('rstatus', 1) as $orderItem)
								@php
									$avgrating = $avgrating + $orderItem->review->rating;	
								@endphp
							@endforeach

							@for($i=1; $i<=5 ;$i++)
								@if($i <= $avgrating)
									<i class="zmdi zmdi-star"></i>
								@else
									<i class="zmdi zmdi-star-outline"></i>
								@endif
							@endfor
						</span>
						<p style="display: inline">( {{$single_product->orderItems->where('rstatus', 1)->count() }} reviews)</p>
						<h4 class="mtext-105 cl2 js-name-detail p-b-14">
							{{$single_product->name}} &nbsp;
						</h4>
						@if($single_product->sale_price > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
							<span class="mtext-106 cl2">
								${{$single_product->sale_price}}
							</span>
							&nbsp;
							<del><span class="cl2">
								${{$single_product->regular_price}}
							</span></del>
						@else
							<span class="mtext-106 cl2">
								${{$single_product->regular_price}}
							</span>
						@endif
						<p class="stext-102 cl3 p-t-23">
							{!! $single_product->short_description !!}
						</p>
						
						<!--  -->
						<div class="p-t-33" wire:ignore>
							<div class="flex-w flex-r-m p-b-10">
								<div class="size-203 flex-c-m respon6">
									Size
								</div>

								<div class="size-204 respon6-next">
									<div class="rs1-select2 bor8 bg0">
										<select class="js-select2" name="time">
											<option>Choose an option</option>
											<option>Size S</option>
											<option>Size M</option>
											<option>Size L</option>
											<option>Size XL</option>
										</select>
										<div class="dropDownSelect2"></div>
									</div>
								</div>
							</div>

							<div class="flex-w flex-r-m p-b-10">
								<div class="size-203 flex-c-m respon6">
									Color
								</div>

								<div class="size-204 respon6-next">
									<div class="rs1-select2 bor8 bg0">
										<select class="js-select2" name="time">
											<option>Choose an option</option>
											<option>Red</option>
											<option>Blue</option>
											<option>White</option>
											<option>Grey</option>
										</select>
										<div class="dropDownSelect2"></div>
									</div>
								</div>
							</div>
							
							<div class="flex-w flex-r-m p-b-10">
								<div class="size-204 flex-w flex-m respon6-next">
									<div class="wrap-num-product flex-w m-r-20 m-tb-10">
										<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m" wire:click.prevent="decreaseQuantity">
											<i class="fs-16 zmdi zmdi-minus" ></i>
										</div>

										<input class="mtext-104 cl3 txt-center num-product" type="number" wire:model="qty">

										<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m" wire:click.prevent="increaseQuantity">
											<i class="fs-16 zmdi zmdi-plus" ></i>
										</div>
									</div>

									@if($single_product->sale_price > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
										<button wire:click.prevent="store({{$single_product->id}}, '{{$single_product->name}}', {{$single_product->sale_price}})" class="m-tb-10 flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
											Add to cart
										</button>
									@else
										<button wire:click.prevent="store({{$single_product->id}}, '{{$single_product->name}}', {{$single_product->regular_price}})" class="m-tb-10 flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
											Add to cart
										</button>
									@endif
								</div>
							</div>	
						</div>

						<!-- Social Media  -->
						<div class="flex-w flex-m p-l-100 p-t-40 respon7">
							<div class="flex-m bor9 p-r-10 m-r-11">
								<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100" data-tooltip="Add to Wishlist">
									<i class="zmdi zmdi-favorite"></i>
								</a>
							</div>

							<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Facebook">
								<i class="fa fa-facebook"></i>
							</a>

							<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Twitter">
								<i class="fa fa-twitter"></i>
							</a>

							<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Google Plus">
								<i class="fa fa-google-plus"></i>
							</a>
						</div>
					</div>
				</div>
			</div>

			<div class="bor10 m-t-50 p-t-43 p-b-40">
				<!-- Tab01 -->
				<div class="tab01">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item p-b-10">
							<a class="nav-link active" data-toggle="tab" href="#description" role="tab">Description</a>
						</li>

						<li class="nav-item p-b-10">
							<a class="nav-link" data-toggle="tab" href="#information" role="tab">Additional information</a>
						</li>

						<li class="nav-item p-b-10">
							<a class="nav-link" data-toggle="tab" href="#reviews" role="tab">Reviews ({{$single_product->orderItems->where('rstatus', 1)->count()}})</a>
						</li>
					</ul>

					<!-- Tab panes -->
					<div class="tab-content p-t-43">
						<!-- - -->
						<div class="tab-pane fade show active" id="description" role="tabpanel">
							<div class="how-pos2 p-lr-15-md">
								<p class="stext-102 cl6">
									{!! $single_product->description !!}
								</p>
							</div>
						</div>

						<!-- - -->
						<div class="tab-pane fade" id="information" role="tabpanel">
							<div class="row">
								<div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
									<ul class="p-lr-28 p-lr-15-sm">
										<li class="flex-w flex-t p-b-7">
											<span class="stext-102 cl3 size-205">
												Weight
											</span>

											<span class="stext-102 cl6 size-206">
												0.79 kg
											</span>
										</li>

										<li class="flex-w flex-t p-b-7">
											<span class="stext-102 cl3 size-205">
												Dimensions
											</span>

											<span class="stext-102 cl6 size-206">
												110 x 33 x 100 cm
											</span>
										</li>

										<li class="flex-w flex-t p-b-7">
											<span class="stext-102 cl3 size-205">
												Materials
											</span>

											<span class="stext-102 cl6 size-206">
												60% cotton
											</span>
										</li>

										<li class="flex-w flex-t p-b-7">
											<span class="stext-102 cl3 size-205">
												Color
											</span>

											<span class="stext-102 cl6 size-206">
												Black, Blue, Grey, Green, Red, White
											</span>
										</li>

										<li class="flex-w flex-t p-b-7">
											<span class="stext-102 cl3 size-205">
												Size
											</span>

											<span class="stext-102 cl6 size-206">
												XL, L, M, S
											</span>
										</li>
									</ul>
								</div>
							</div>
						</div>

						<!-- - -->
						<div class="tab-pane fade" id="reviews" role="tabpanel">
							<div class="row">
								<div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
									<div class="p-b-30 m-lr-15-sm">
										<!-- Review -->
										@foreach($single_product->orderItems->where('rstatus', 1) as $orderItem)
										<div class="flex-w flex-t p-b-68">
											<div class="wrap-pic-s size-109 bor0 of-hidden m-r-18 m-t-6">
												<img src="{{ asset('assets/images/users_images')}}/{{$orderItem->order->user->profile_photo_path}}" alt="A') }}VATAR">
											</div>

											<div class="size-207">
												<div class="flex-w flex-sb-m p-b-17">
													<span class="mtext-107 cl2 p-r-20">
														{{$orderItem->order->user->name }} &nbsp;
														<p>{{ Carbon\Carbon::parse($orderItem->review->created_at)->format('d F Y g:i A') }}</p>
													</span>

													<span class="fs-18 cl11">
														@for($i=1 ; $i<=5 ;$i++)
															@if($i <= $orderItem->review->rating)
																<i class="zmdi zmdi-star"></i>
															@else
																<i class="zmdi zmdi-star-outline"></i>
															@endif
														@endfor
													</span>
												</div>

												<p class="stext-102 cl6">
													{{ $orderItem->review->comment }}
												</p>
											</div>
										</div>
										@endforeach
										<!-- Add review -->
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="bg6 flex-c-m flex-w size-302 m-t-73 p-tb-15">
			<span class="stext-107 cl6 p-lr-25">
				SKU: {{ $single_product->SKU }}
			</span>

			<span class="stext-107 cl6 p-lr-25">
				Categories: {{ $single_product->category->name }}
			</span>
		</div>
	</section>


	<!-- Related Products -->
	<section class="sec-relate-product bg0 p-t-45 p-b-105" wire:ignore>
		<div class="container">
			<div class="p-b-45">
				<h3 class="ltext-106 cl5 txt-center">
					Related Products
				</h3>
			</div>

			<!-- Slide2 -->
			<div class="wrap-slick2">
				<div class="slick2">
				@foreach($related_products as $r_product)
					<div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
						<!-- Block2 -->
						<div class="block2">
							<div class="block2-pic hov-img0">
								<img src="{{ asset('assets/images')}}/{{$r_product->image}}" alt="IMG-PRODUCT">

								<a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
									Quick View
								</a>
							</div>

							<div class="block2-txt flex-w flex-t p-t-14">
								<div class="block2-txt-child1 flex-col-l ">
									<a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
										{{ $r_product->name }}
									</a>

									<span class="stext-105 cl3">
										${{ $r_product->regular_price }}
									</span>
								</div>

								<div class="block2-txt-child2 flex-r p-t-3">
									<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
										<img class="icon-heart1 dis-block trans-04" src="{{ asset('assets/images/icons/icon-heart-01.png') }}" alt="ICON">
										<img class="icon-heart2 dis-block trans-04 ab-t-l" src="{{ asset('assets/images/icons/icon-heart-02.png') }}" alt="ICON">
									</a>
								</div>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</section>
</div>