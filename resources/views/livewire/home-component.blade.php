
	<!-- Slider -->
	<section class="section-slide">
		<div class="wrap-slick1">
			<div class="slick1">
				@foreach($sliders as $slider)
					<div class="item-slick1" style="background-image: url({{ asset('assets/images/sliders') }}/{{$slider->image}});">
						<div class="container h-full">
							<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
								<div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
									<span class="ltext-101 cl2 respon2">
										{{$slider->subtitle}}
									</span>
									&nbsp;&nbsp;
									<span class="ltext-101 cl2 respon2">
										${{$slider->price}}
									</span>
								</div>
									
								<div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
									<h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
										{{$slider->title}}
									</h2>
								</div>
									
								<div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
									<a href="{{$slider->link}}" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
										Shop Now
									</a>
								</div>
							</div>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</section>


	<!-- Banner -->
	@if($sproducts->count() > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now() )
	<div class="sec-banner bg0 p-t-80 p-b-50">
		<div class="container">
			<div class="p-b-5">
				<span class="ltext-103 cl5">
					On Sale
				</span>

				<span class="mtext-112 float-right">
					{{ Carbon\Carbon::parse($sale->sale_date)->format('M : D - h:i  a') }}
				</span>
			</div>
			<hr>

			<div class="row">
				@foreach($sproducts as $sproduct)
					<div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
						<!-- Block1 -->
						<div class="block1 wrap-pic-w">
							<img src="{{ asset('assets/images')}}/{{$sproduct->image}}" alt="{{$sproduct->name}}">

							<a href="{{ route('product.details',['slug'=>$sproduct->slug])}}" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
								<div class="block1-txt-child1 flex-col-l">
									<span class="block1-name ltext-102 trans-04 p-b-8">
										{{$sproduct->name}}
									</span>

									<span class="block1-info stext-102 trans-04">
										Sale Price: <ins>${{$sproduct->sale_price}}</ins>&nbsp;&nbsp;<del class="text-danger">${{$sproduct->regular_price}}</del>
									</span>

									<span class="block1-info stext-102 trans-04">
										Spring 2018
									</span>
								</div>

								<div class="block1-txt-child2 p-b-4 trans-05">
									<div class="block1-link stext-101 cl0 trans-09">
										Shop Now
									</div>
								</div>
							</a>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</div>
	@endif

	<!-- Product -->
	<section class="bg0 p-t-23 p-b-140">
		<div class="container">
			<div class="p-b-10">
				<h3 class="ltext-103 cl5">
					Latest Product
				</h3>
				<hr>
			</div>

			<div class="row isotope-grid">
				@foreach($lproducts as $lproduct)
					<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
						<!-- Block2 -->
						<div class="block2">
							<div class="block2-pic hov-img0">
								<img src="{{ asset('assets/images') }}/{{$lproduct->image}}" alt="{{$lproduct->name}}">

								<a href="{{route('product.details', ['slug'=>$lproduct->slug]) }}" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
									Quick View
								</a>
							</div>

							<div class="block2-txt flex-w flex-t p-t-14">
								<div class="block2-txt-child1 flex-col-l ">
									<a href="{{route('product.details', ['slug'=>$lproduct->slug]) }}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
										{{$lproduct->name}}
									</a>

									<span class="stext-105 cl3">
										${{$lproduct->regular_price}}
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
	</section>
