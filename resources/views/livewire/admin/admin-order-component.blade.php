<div class="container-fluid p-5 admin-con">
    <div class="row">
        <div class="col-12">
            @if(Session::has('order_message'))
                <div class="alert alert-success" role="alert">{{ Session::get('order_message')}}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="card-title col-6">
                            All Orders
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                               <th>OrderId</th>
                               <th>Subtotal</th>
                               <th>Discount</th>
                               <th>Tax</th>
                               <th>Total</th>
                               <th>First Name</th>
                               <th>Last Name</th>
                               <th>Mobile</th>
                               <th>Email</th>
                               <th>Zip code</th>
                               <th>Status</th>
                               <th>Order Date</th>
                               <th colspan="2" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                           <tr>
                               <td>{{ $order->id }}</td>
                               <td>${{ $order->subtotal }}</td>
                               <td>${{ $order->discount }}</td>
                               <td>${{ $order->tax}}</td>
                               <td>${{ $order->total}}</td>
                               <td>{{ $order->firstname}}</td>
                               <td>{{ $order->lastname}}</td>
                               <td>{{ $order->mobile}}</td>
                               <td>{{ $order->email}}</td>
                               <td>{{ $order->zipcode}}</td>
                               <td>{{ $order->status}}</td>
                               <td>{{ $order->created_at}}</td>
                               <td>
                                   <a href="{{route('admin.orderdetail', ['order_id'=> $order->id ])}}" class="btn btn-outline-primary">Detail</a>
                               </td>
                               <td>
                                   <div class="dropdown">
                                       <button class="btn btn-success btn-sm dropdown-toggle" type="button" data-toggle="dropdown">Status
                                           <span class="caret"></span>
                                       </button>
                                       <ul class="dropdown-menu">
                                           <li><a href="#" wire:click.prevent="updateOrderStatus({{$order->id }}, 'delivered')">Delivered</a></li>
                                           <li><a href="#" wire:click.prevent="updateOrderStatus({{$order->id }}, 'canceled')">Canceled</a></li>
                                       </ul>
                                   </div>
                               </td>
                           </tr>
                        @endforeach
                       </tbody>
                   </table>
                    {{ $orders->links() }}
                </div>
            </div>
        </div>
     </div>
</div>
