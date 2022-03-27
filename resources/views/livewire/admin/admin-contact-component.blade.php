
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
                            Contact Messages
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                               <th>#</th>
                               <th>Email</th>
                               <th>Phone</th>
                               <th>Comment</th>
                               <th>Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($contacts as $contact)
                           <tr>
                               <td>{{ $contact->id }}</td>
                               <td class="js-name-product">{{ $contact->email }}</td>
                               <td>{{ $contact->phone}}</td>
                               <td>{{ $contact->comment}}</td>
                               <td>{{ $contact->created_at}}</td>
                           </tr>
                        @endforeach
                       </tbody>
                   </table>
                    {{ $contacts->links() }}
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




