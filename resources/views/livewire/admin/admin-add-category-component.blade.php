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
                            Add Category
                        </div>

                        <div class="col-md-6">
                            <a href="{{route('admin.categories')}}" class="btn btn-success cat-button">All Categories</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form class="form" wire:submit.prevent="storeCategory">
                        <div class="form-group">
                            <label for="nameCategory" class="form-label">Category Name</label>
                            <input type="text" name="nameCategory" placeholder="Category Name" class="form-control" wire:model="name" wire:keyup="generateSlug">
                            @error('name') <p class="text-danger">{{$message}}</p> @enderror
                        </div>

                        <div class="form-group">
                            <label for="slug" class="form-label">Category Slug</label>
                            <input type="text" name="slug" placeholder="Category Slug" class="form-control" wire:model="slug">
                            @error('slug') <p class="text-danger">{{$message}}</p> @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" name="submit"class="btn btn-info js-add-alert">Submit</button>
                            <a href="{{ route('admin.categories') }}" class="btn btn-outline-info">Cancel</a>
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
				swal('Category', "has been created successfully !", "success");
			});
		});
</script>
