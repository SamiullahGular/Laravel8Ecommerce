<div>
	<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
	<style>
		.input-inline{
			display: inline;
		}
	</style>

        <main class="main" style="margin-top: 70px;">
			<div class="container p-t-30 m-5">
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
						Checkout
					</span>
				</div>
			</div>
			<!-- End .breadcrumb-nav -->

            <div class="page-content">
            	<div class="checkout">
	                <div class="container">
                    <h4 style="color: black; margin-bottom:10px;">BILLING DETAILS</h4>
            			<form wire:submit.prevent="placeOrder"> {{-- form for submit the checkout --}}
		                	<div class="row">
		                		<div class="col-lg-9">
		                			<div class="row">
		                				<div class="col-sm-6">
		                					<label>First Name <span class="text-danger">*</span></label>
		                					<input type="text" name="fname" placeholder="Your first name" class="form-control" wire:model="firstname">
											@error('firstname')<span class="text-danger">{{ $message }}</span>@enderror
		                				</div><!-- End .col-sm-6 -->

		                				<div class="col-sm-6">
		                					<label>Last Name <span class="text-danger">*</span></label>
		                					<input type="text" placeholder="Your last name" class="form-control" wire:model="lastname">
											@error('lastname') <span class="text-danger">{{ $message }}</span>@enderror
										</div><!-- End .col-sm-6 -->
		                			</div><!-- End .row -->

	            					<label>Country <span class="text-danger">*</span></label>
	            					<input type="text" name="country" placeholder="Your country" class="form-control" wire:model="country">
									@error('country') <span class="text-danger">{{ $message }}</span>@enderror
	            					
									<label>Street address <span class="text-danger">*</span></label>
	            					<input type="text" class="form-control m-3" placeholder="House number and Street name Line 1" wire:model="line1">
	            					@error('line1') <span class="text-danger">{{ $message }}</span>@enderror
									<input type="text" class="form-control m-3" placeholder="Appartments, suite, unit etc Line 2" wire:model="line2">

	            					<div class="row">
		                				<div class="col-sm-6">
		                					<label>Town / City <span class="text-danger">*</span></label>
		                					<input type="text" name="city" placeholder="Your city" class="form-control" wire:model="city">
											@error('city') <span class="text-danger">{{ $message }}</span> @enderror
										</div><!-- End .col-sm-6 -->

		                				<div class="col-sm-6">
		                					<label>Province <span class="text-danger">*</span></label>
		                					<input type="text" name="province" placeholder="Your province" class="form-control" wire:model="province">
											@error('province') <span class="text-danger">{{ $message }}</span>@enderror
										</div><!-- End .col-sm-6 -->
		                			</div><!-- End .row -->

		                			<div class="row">
		                				<div class="col-sm-6">
		                					<label>Postcode / ZIP <span class="text-danger">*</span></label>
		                					<input type="text" placeholder="Zip code" class="form-control" wire:model="zipcode">
											@error('zipcode') <span class="text-danger">{{ $message }}</span>@enderror
										</div><!-- End .col-sm-6 -->

		                				<div class="col-sm-6">
		                					<label>Phone <span class="text-danger">*</span></label>
		                					<input type="tel" name="phone" placeholder="phone number" class="form-control" wire:model="mobile">
											@error('mobile') <span class="text-danger">{{ $message }}</span>@enderror
										</div><!-- End .col-sm-6 -->
		                			</div><!-- End .row -->

	                				<label>Email address <span class="text-danger">*</span></label>
	        						<input type="email" name="email" placeholder="Your email address" class="form-control" wire:model="email">
									@error('email') <span class="text-danger">{{ $message }}</span>@enderror
		                		
									<hr>
									<label for="shipping_different" class="form-label">
										<input type="checkbox" name="shipping_different" value="1" class="input-inline" wire:model="ship_to_different"> &nbsp;
										Ship to a different address?
									</label>

								</div><!-- End .col-lg-9 -->

								@if($ship_to_different)
									<div class="col-lg-9 mt-3">
										<h4 style="color: black; margin-bottom:10px;">SHIPPING ADDRESS</h4>
										<div class="row">
											<div class="col-sm-6">
												<label>First Name <span class="text-danger">*</span></label>
												<input type="text" name="s_fname" placeholder="Your first name" class="form-control" wire:model="s_firstname">
												@error('s_firstname')<span class="text-danger">{{ $message }}</span>@enderror
											</div><!-- End .col-sm-6 -->

											<div class="col-sm-6">
												<label>Last Name <span class="text-danger">*</span></label>
												<input type="text" placeholder="Your last name" class="form-control" wire:model="s_lastname">
												@error('s_lastname') <span class="text-danger">{{ $message }}</span>@enderror
											</div><!-- End .col-sm-6 -->
										</div><!-- End .row -->

										<label>Country <span class="text-danger">*</span></label>
										<input type="text" name="s_country" placeholder="Your country" class="form-control" wire:model="s_country">
										@error('s_country') <span class="text-danger">{{ $message }}</span>@enderror
										
										<label>Street address <span class="text-danger">*</span></label>
										<input type="text" class="form-control m-3" placeholder="House number and Street name Line 1" wire:model="s_line1">
										@error('s_line1') <span class="text-danger">{{ $message }}</span>@enderror
										<input type="text" class="form-control m-3" placeholder="Appartments, suite, unit etc Line 2" wire:model="s_line2">

										<div class="row">
											<div class="col-sm-6">
												<label>Town / City <span class="text-danger">*</span></label>
												<input type="text" name="s_city" placeholder="Your city" class="form-control" wire:model="s_city">
												@error('s_city') <span class="text-danger">{{ $message }}</span> @enderror
											</div><!-- End .col-sm-6 -->

											<div class="col-sm-6">
												<label>Province <span class="text-danger">*</span></label>
												<input type="text" name="s_province" placeholder="Your province" class="form-control" wire:model="s_province">
												@error('s_province') <span class="text-danger">{{ $message }}</span>@enderror
											</div><!-- End .col-sm-6 -->
										</div><!-- End .row -->

										<div class="row">
											<div class="col-sm-6">
												<label>Postcode / ZIP <span class="text-danger">*</span></label>
												<input type="text" placeholder="Zip code" class="form-control" wire:model="s_zipcode">
												@error('s_zipcode') <span class="text-danger">{{ $message }}</span>@enderror
											</div><!-- End .col-sm-6 -->

											<div class="col-sm-6">
												<label>Phone <span class="text-danger">*</span></label>
												<input type="tel" name="s_phone" placeholder="phone number" class="form-control" wire:model="s_mobile">
												@error('s_mobile') <span class="text-danger">{{ $message }}</span>@enderror
											</div><!-- End .col-sm-6 -->
										</div><!-- End .row -->

										<label>Email address <span class="text-danger">*</span></label>
										<input type="email" name="s_email" placeholder="Your email address" class="form-control" wire:model="s_email">
										@error('s_email') <span class="text-danger">{{ $message }}</span>@enderror

									</div><!-- End .col-lg-9 -->
								@endif
								
		                		<aside class="col-lg-3">
		                			<div class="summary">
		                				<h3 class="summary-title">Your Order</h3><!-- End .summary-title -->

		                				<table class="table table-summary">
		                					<thead>
		                						<tr>
		                							<th>Product</th>
		                							<th>Total</th>
		                						</tr>
		                					</thead>

		                					<tbody>
												@foreach (Cart::instance('cart')->content() as $item)
		                						<tr>
		                							<td><a href="#">{{$item->name}}</a></td>
		                							<td>${{ $item->price}}</td>
		                						</tr>
												@endforeach

		                						<tr class="summary-subtotal">
		                							<td>Subtotal:</td>
													@if(Session::has('checkout'))
		                								<td>${{ Session::get('checkout')['subtotal'] }}</td>
													@endif
		                						</tr><!-- End .summary-subtotal -->
		                						<tr>
		                							<td>Shipping:</td>
		                							<td>Free shipping</td>
		                						</tr>
		                						<tr class="summary-total">
		                							<td>Total:</td>
													@if(Session::has('checkout'))
		                								<td>${{ Session::get('checkout')['total'] }}</td>
													@endif
		                						</tr><!-- End .summary-total -->
												<tr>
													<td style="font-size: 20px; color: black;">Payment Methods</td>
												</tr>
		                					</tbody>
		                				</table><!-- End .table table-summary -->

										
		                				<div class="accordion-summary" id="accordion-payment">
											@if(Session::has('stripe_error'))
												<div class="alert alert-danger" role="alert">{{ Session::get('stripe_error')}}</div>
											@endif
											@if($paymentmode == 'card')
												<div class="row">
													<div class="col-sm-6">
														<label class="text-dark">Card Number <span class="text-danger">*</span></label>
														<input type="text" name="card-no" placeholder="card number" class="form-control" wire:model="card_no">
														@error('card_no') <span class="text-danger">{{ $message }}</span> @enderror
													</div><!-- End .col-sm-6 -->
		
													<div class="col-sm-6">
														<label class="text-dark">Expiry Month <span class="text-danger">*</span></label>
														<input type="text" name="exp-month" placeholder="MM" class="form-control" wire:model="exp_month">
														@error('exp_month') <span class="text-danger">{{ $message }}</span>@enderror
													</div><!-- End .col-sm-6 -->
												</div><!-- End .row -->

												<div class="row">
													<div class="col-sm-6">
														<label class="text-dark">Expiry Year <span class="text-danger">*</span></label>
														<input type="text" name="exp-year" placeholder="YYYY" class="form-control" wire:model="exp_year">
														@error('exp_year') <span class="text-danger">{{ $message }}</span> @enderror
													</div><!-- End .col-sm-6 -->
		
													<div class="col-sm-6">
														<label class="text-dark">CVC <span class="text-danger">*</span></label>
														<input type="password" name="cvc" placeholder="cvc" class="form-control" wire:model="cvc">
														@error('cvc') <span class="text-danger">{{ $message }}</span>@enderror
													</div><!-- End .col-sm-6 -->
												</div><!-- End .row -->
											@endif
											{{-- End of payment method --}}
										    <div class="card">
										        <div class="card-header">
										            <h2 class="card-title">
														<input type="radio" name="payment-method" value="cod" class="collapsed input-inline" data-toggle="collapse"
														 href="#collapse-3" aria-expanded="false" aria-controls="collapse-3" wire:model="paymentmode"> 
										    			Cash on delivery
										            </h2>
										        </div><!-- End .card-header -->
										        <div id="collapse-3" class="collapse" aria-labelledby="heading-3" data-parent="#accordion-payment">
										            <div class="card-body">
														Order Now Pay on Delivery 
										            </div><!-- End .card-body -->
										        </div><!-- End .collapse -->
										    </div><!-- End .card -->

											<div class="card">
										        <div class="card-header" id="heading-5">
										            <h2 class="card-title">
										                <input type="radio" name="payment-method" value="card" class="collapsed input-inline" data-toggle="collapse"
														 href="#collapse-5" aria-expanded="false" aria-controls="collapse-5" wire:model="paymentmode">
										                    Debit / Credit Card
										                    <img src="{{ asset('assets/images/icons/icon-pay-01.png') }}" class="input-inline" alt="payments cards">
										            </h2>
										        </div><!-- End .card-header -->
										        <div id="collapse-5" class="collapse" aria-labelledby="heading-5" data-parent="#accordion-payment">
										            <div class="card-body">
														There are many ways to checkout with credit card.
										            </div><!-- End .card-body -->
										        </div><!-- End .collapse -->
										    </div><!-- End .card -->

										    <div class="card">
										        <div class="card-header" id="heading-4">
										            <h2 class="card-title">
										                <input type="radio" name="payment-method" value="paypal" class="collapsed input-inline" data-toggle="collapse"
														 href="#collapse-4" aria-expanded="false" aria-controls="collapse-4" wire:model="paymentmode">
										                    PayPal <small class="float-right paypal-link">What is PayPal?</small>
										                </a>
										            </h2>
										        </div><!-- End .card-header -->
										        <div id="collapse-4" class="collapse" aria-labelledby="heading-4" data-parent="#accordion-payment">
										            <div class="card-body">
														<p>You can pay with your credit card if you don't have a paypal account</p>
										            </div><!-- End .card-body -->
										        </div><!-- End .collapse -->
												@error('paymentmode') <span class="text-danger" >{{ $message }}</span> @enderror
										    </div><!-- End .card -->
										</div><!-- End .accordion -->
										

		                				<button type="submit" class="btn btn-outline-success">
		                					Place Order
		                				</button>
		                			</div><!-- End .summary -->
		                		</aside><!-- End .col-lg-3 -->
		                	</div><!-- End .row -->
            			</form>
	                </div><!-- End .container -->
                </div><!-- End .checkout -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->
</div>
	