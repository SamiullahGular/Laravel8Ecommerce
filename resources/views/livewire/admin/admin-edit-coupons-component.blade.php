<div class="container p-5 admin-con">
    <div class="row m-l-60">
        <div class="col-md-9">
            @if(Session::has('message'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('message') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="card-title col-md-6">
                            Edit Coupon
                        </div>

                        <div class="col-md-6">
                            <a href="{{route('admin.coupons')}}" class="btn btn-success cat-button">All Coupons</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form class="form" wire:submit.prevent="updateCoupon">
                        <div class="form-group">
                            <label for="coupon_code" class="form-label">Coupon Code</label>
                            <input type="text" name="coupon_code" placeholder="Coupon Code" class="form-control" wire:model="code">
                            @error('code') <p class="text-danger">{{$message}}</p> @enderror
                        </div>

                        <div class="form-group">
                            <label for="" class="form-label">Coupon Type</label>
                            <select name="" class="form-control" wire:model="type">
                                <option value="">Select</option>
                                <option value="fixed">Fixed</option>
                                <option value="percent">Percent</option>
                            </select>
                            @error('type') <p class="text-danger">{{$message}}</p> @enderror
                        </div>

                        <div class="form-group">
                            <label for="" class="form-label">Coupon Value</label>
                            <input type="text" name="" placeholder="Coupon Value" class="form-control" wire:model="value">
                            @error('value') <p class="text-danger">{{$message}}</p> @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="" class="form-label">Cart Value</label>
                            <input type="text" name="" placeholder="Cart Value" class="form-control" wire:model="cart_value">
                            @error('cart_vlaue') <p class="text-danger">{{$message}}</p> @enderror
                        </div>

                        <div class="form-group" wire:ignore>
                            <label for="expiry-date" class="form-label">Expiry Date</label>
                            <input type="date" id="expiry-date" placeholder="Expiry Date" class="form-control" wire:model="expiry_date">
                            @error('expiry_date') <p class="text-danger">{{$message}}</p> @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" name="submit"class="btn btn-info js-add-alert">Update</button>
                            <a href="{{ route('admin.coupons') }}" class="btn btn-outline-info">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    /*------------------ Alert for Add category --------------------- */
		$('.js-add-alert').each(function(){
			$(this).on('click', function(){
				swal('Coupon', "has been created successfully !", "success");
			});
		});
</script>

