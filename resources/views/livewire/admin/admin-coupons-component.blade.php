<div class="container p-5 admin-con">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="card-title col-md-6">
                            All Coupons
                        </div>

                        <div class="col-md-6">
                            <a href="{{ route('admin.addCoupon')}}" class="btn btn-success cat-button">Add New</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                               <th>ID</th>
                               <th>Coupon Code</th>
                               <th>Coupon Type</th>
                               <th>Coupon Value</th>
                               <th>Cart Value</th>
                               <th>Expiry Date</th>
                               <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($coupons as $coupon)
                           <tr>
                                <td>{{ $coupon->id }}</td>
                                <td>{{ $coupon->code }}</td>
                                <td>{{ $coupon->type }}</td>
                                @if($coupon->type == 'fixed')
                                    <td>${{ $coupon->value }}</td>
                                @else
                                    <td>{{ $coupon->value }} %</td>
                                @endif
                                <td>{{ $coupon->cart_value }}</td>
                                <td>{{ $coupon->expiry_date }}</td>
                                <td>
                                    <a href="{{ route('admin.editCouponn', ['coupon_id'=> $coupon->id]) }}"><i class="fa fa-edit fa-2x"></i></a>
                                    <a href="#" onclick="confirm('Are you sure, You want to delete the coupon?') || event.stopImmediatePropagation()" wire:click.prevent="deleteCoupon({{ $coupon->id}})" style="margin-left: 5px;" class="js-delete-alert"><i class="fa fa-times fa-2x text-danger"></i></a>
                                </td>
                            </tr>
                        @endforeach
                       </tbody>
                   </table>
                </div>
            </div>
        </div>
     </div>
</div>
<script>
    /*------------------ Alert for Delete category --------------------- */
		$('.js-delete-alert').each(function(){
			var nameCategory = $(this).parent().parent().parent().parent().find('.js-name-category').html();
			$(this).on('click', function(){
				swal(nameCategory, "has been deleted successfully !", "delete");
			});
		});
</script>



