<div class="container p-5 admin-con">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="card-title col-md-6">
                            All Categories
                        </div>

                        <div class="col-md-6">
                            <a href="{{ route('admin.addCategory')}}" class="btn btn-success cat-button">Add New Category</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                               <th>ID</th>
                               <th>Category Name</th>
                               <th>Slug</th>
                               <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                           <tr>
                               <td>{{ $category->id }}</td>
                               <td class="js-name-category">{{ $category->name }}</td>
                               <td>{{ $category->slug }}</td>
                               <td>
                                   <a href="{{ route('admin.editCategory', ['category_slug'=> $category->slug]) }}"><i class="fa fa-edit fa-2x"></i></a>
                                   <a href="#" onclick="confirm('Are you sure, You want to delete the category?') || event.stopImmediatePropagation()" wire:click.prevent="deleteCategory({{ $category->id}})" style="margin-left: 5px;" class="js-delete-alert"><i class="fa fa-times fa-2x text-danger"></i></a>
                               </td>
                           </tr>
                        @endforeach
                       </tbody>
                   </table>
                    {{ $categories->links() }}
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


