<div class="container p-5 admin-con">
    <div class="row">
        <div class="col-md-12">
            @if(Session::has('message'))
            <div class="alert alert-success">{{ Session::get('message')}}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="card-title col-md-6">
                            Add New Product
                        </div>

                        <div class="col-md-6">
                            <a href="{{route('admin.products')}}" class="btn btn-success cat-button">All Products</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form class="row" enctype="multipart/form-data" wire:submit.prevent="addProduct()">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name" class="form-label">Product Name</label>
                                <input type="text" class="form-control" placeholder="Product name" wire:model="name" wire:keyup="generateSlug()">
                                @error('name') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>

                            <div class="form-group">
                                <label for="slug" class="form-label">Product Slug</label>
                                <input type="text" class="form-control" placeholder="product-slug" wire:model="slug">
                                @error('slug') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="short_description" class="form-label">Short Description</label>
                                <div wire:ignore>
                                    <textarea class="form-control" id="short_description" placeholder="Short description..." wire:model="short_description"></textarea>
                                    @error('short_description') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="sku" class="form-label">SKU</label>
                                <input type="text" class="form-control" placeholder="SKU" wire:model="sku">
                                @error('sku') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>

                            <div class="form-group">
                                <label for="regular_price" class="form-label">Regular Price</label>
                                <input type="text" class="form-control" placeholder="Regular Price" wire:model="regular_price">
                                @error('regular_price') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>

                            <div class="form-group">
                                <label for="sale_price" class="form-label">Sale Price</label>
                                <input type="number" class="form-control" placeholder="Sale Price" wire:model="sale_price">
                                @error('sale_price') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="stock" class="form-label">Stock Status</label>
                                <select class="form-control" name="stock" wire:model="stock_status">
                                    <option value="instock">Instock</option>
                                    <option value="outofstock">Out of Stock</option>
                                </select>
                                @error('stock_status') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>

                            <div class="form-group">
                                <label for="featured" class="form-label">Featured</label>
                                <select name="featured" class="form-control" wire:model="featured">
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                            </div>

                            <div class="form-group" wire:ignore>
                                <label for="description"  class="form-label">Description</label>
                                <textarea class="form-control" id="description" placeholder="Description..." wire:model="description"></textarea>
                                @error('description') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>

                            <div class="form-group">
                                <label for="quantity" class="form-label">Quantity</label>
                                <input type="number" class="form-control" placeholder="Quantity" wire:model="quantity">
                                @error('quantity') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>

                            <div class="form-group">
                                <label for="category" class="form-label">Select Category</label>
                                <select name="category" class="form-control" wire:model="category_id">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="image" class="form-label">Product Image</label>
                                <input type="file" class="form-control" wire:model="image">
                                @error('image') <p class="text-danger">{{ $message }}</p> @enderror
                                @if($image)
                                    <img src="{{ $image->temporaryUrl() }}" alt="$name" width="120px">
                                @endif
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary js-add-alert col-10" style="margin-left: 85px;">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $(function(){
            tinymce.init({
                selector:'#short_description', 
                setup: function(editor){
                    editor.on('Change', function(e){
                        tinyMCE.triggerSave();
                        var sd_data = $('#short_description').val();
                        @this.set('short_description', sd_data);
                    });
                }
            });

            tinymce.init({
                selector:'#description', 
                setup: function(editor){
                    editor.on('Change', function(e){
                        tinyMCE.triggerSave();
                        var d_data = $('#description').val();
                        @this.set('description', d_data);
                    });
                }
            });
        });
    </script>
@endpush
<script>
    // /*------------------ Alert for Add category --------------------- */
	// $('.js-add-alert').each(function(){
	// 	$(this).on('click', function(){
	// 		swal('Product', "has been added successfully !", "success");
	// 	});
	// });
</script>
