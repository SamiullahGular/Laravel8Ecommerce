
<div class="container p-5 admin-con">
    <div class="row">
        <div class="col-12">
            @if(Session::has('message'))
            <div class="alert alert-success" role="alert">{{ Session::get('message')}}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="card-title col-6">
                            All Products
                        </div>

                        <div class="col-6">
                            <a href="{{route('admin.addProduct')}}" class="btn btn-success cat-button">Add New Product</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                               <th>ID</th>
                               <th>Image</th>
                               <th>Name</th>
                               <th>Stock</th>
                               <th>Price</th>
                               <th>Sale Price</th>
                               <th>Category</th>
                               <th>Date</th>
                               <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                           <tr>
                               <td>{{ $product->id }}</td>
                               <td>
                                    <div class="how-itemcart1">
										<img src="{{ asset('assets/images')}}/{{ $product->image }}" alt="{{ $product->name }}">
									</div>
                               </td>
                               <td class="js-name-product">{{ $product->name }}</td>
                               <td>{{ $product->stock_status}}</td>
                               <td>{{ $product->regular_price}}</td>
                               <td>{{ $product->sale_price}}</td>
                               <td>{{ $product->category->name}}</td>
                               <td>{{ $product->created_at}}</td>
                               <td>
                                   <a href="{{ route('admin.editProduct',['product_slug'=> $product->slug]) }}"><i class="fa fa-edit fa-2x"></i></a>
                                   <a href="#" style="margin-left: 5px;" class="js-delete-alert-pro" wire:click.prevent="deleteProduct({{ $product->id}})"><i class="fa fa-times fa-2x text-danger"></i></a>
                               </td>
                           </tr>
                        @endforeach
                       </tbody>
                   </table>
                    {{ $products->links() }}
                </div>
            </div>
        </div>
     </div>
</div>


<script>
    /*------------------ Alert for Delete product --------------------- */
	// $('.js-delete-alert-pro').each(function(){
	// 	var nameProduct = $(this).parent().parent().find('.js-name-product').html();
	// 	$(this).on('click', function(){
	// 		swal(nameProduct, "has been deleted successfully !", "success");
	// 	});
	// });
</script>



