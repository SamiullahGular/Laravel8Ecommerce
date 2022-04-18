<div class="container-fluid p-5 admin-con">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="card-title col-6">
                            Order Item
                        </div>

                        <div class="col-6">
                            <a href="{{route('admin.orders')}}" class="btn btn-success btn-rounded cat-button">All Orders</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="m-l-25 m-lr-0-xl">
                                <div class="wrap-table-shopping-cart">
                                    <table class="table-shopping-cart">
                                        <tr class="table_head">
                                            <th class="column-1">Product</th>
                                            <th class="column-2"></th>
                                            <th class="column-3">Price</th>
                                            <th class="column-4">Quantity</th>
                                            <th class="column-5">Total</th>
                                        </tr>
                                        @foreach($order->orderItems as $item)
                                            <tr class="table_row">
                                                <td class="column-1">
                                                    <div class="how-itemcart1">
                                                        <img src="{{ asset('assets/images')}}/{{ $item->product->image }}" alt="{{ $item->product->name }}">
                                                    </div>
                                                </td>
                                                <td class="column-2"><a href="{{ route('product.details', ['slug'=> $item->product->slug])}}">{{ $item->product->name }}</a></td>
                                                <td class="column-3">$ {{ $item->product->regular_price}}</td>
                                                <td class="column-4">
                                                    <h5>{{ $item->quantity }}</h5>
                                                </td>
                                                <td class="column-5">$ {{$item->price * $item->quantity}}</td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>

                            <div style="background-color: darkgray" class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                                <h4 class="mtext-109 cl2 p-b-30">
                                Summary 
                                </h4>
    
                                <div class="flex-w flex-t bor12 p-b-13">
                                    <div class="size-208">
                                        <span class="stext-110 cl2">
                                        Subtotal:
                                        </span>
                                    </div>
    
                                    <div class="size-209">
                                        <span class="mtext-110 cl2">
                                        ${{$order->subtotal}}
                                        </span>
                                    </div>
                                </div>

                                <div class="flex-w flex-t bor12 p-b-13">
                                    <div class="size-208">
                                        <span class="stext-110 cl2">
                                        Shipping:
                                        </span>
                                    </div>
    
                                    <div class="size-209">
                                        <span class="mtext-110 cl2">
                                        Free Shipping
                                        </span>
                                    </div>
                                </div>

                                <div class="flex-w flex-t bor12 p-t-15 p-b-30">
                                    <div class="size-208 w-full-ssm">
                                        <span class="stext-110 cl2">
                                        Tax:
                                        </span>
                                    </div>
    
                                    <div class="size-209">
                                        <span class="mtext-110 cl2">
                                        ${{$order->tax}}
                                        </span>
                                    </div>
                                </div>
    
                                <div class="flex-w flex-t p-t-27 p-b-33">
                                    <div class="size-208">
                                        <span class="mtext-101 cl2">
                                        Total:
                                        </span>
                                    </div>
    
                                    <div class="size-209 p-t-1">
                                        <span class="mtext-110 cl2">
                                        ${{$order->total}}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-header">
                    Billing Details
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                            <th>First Name</th>
                            <td>{{ $order->firstname }}</td>
                            <th>Last Name </th>
                            <td>{{ $order->lastname }}</td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td>{{ $order->mobile }}</td>
                            <th>Email </th>
                            <td>{{ $order->email }}</td>
                        </tr>
                        <tr>
                            <th>Line 1</th>
                            <td>{{ $order->line1 }}</td>
                            <th>Line 2 </th>
                            <td>{{ $order->line2 }}</td>
                        </tr>
                        <tr>
                            <th>City</th>
                            <td>{{ $order->city }}</td>
                            <th>Province </th>
                            <td>{{ $order->province }}</td>
                        </tr>
                        <tr>
                            <th>Country</th>
                            <td>{{ $order->country }}</td>
                            <th>Zip code </th>
                            <td>{{ $order->zipcode }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            @if($order->is_shipping_different)
            <div class="card mt-3">
                <div class="card-header">
                    Shipping Details
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                            <th>First Name</th>
                            <td>{{ $order->shipping->firstname }}</td>
                            <th>Last Name </th>
                            <td>{{ $order->shipping->lastname }}</td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td>{{ $order->shipping->mobile }}</td>
                            <th>Email </th>
                            <td>{{ $order->shipping->email }}</td>
                        </tr>
                        <tr>
                            <th>Line 1</th>
                            <td>{{ $order->shipping->line1 }}</td>
                            <th>Line 2 </th>
                            <td>{{ $order->shipping->line2 }}</td>
                        </tr>
                        <tr>
                            <th>City</th>
                            <td>{{ $order->shipping->city }}</td>
                            <th>Province </th>
                            <td>{{ $order->shipping->province }}</td>
                        </tr>
                        <tr>
                            <th>Country</th>
                            <td>{{ $order->shipping->country }}</td>
                            <th>Zip code </th>
                            <td>{{ $order->shipping->zipcode }}</td>
                        </tr>
                    </table>
                </div>
            </div>
            @endif

            <div class="card mt-3">
                <div class="card-header">
                    Transaction
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>Transaction Mode</th>
                            <td>{{ $order->transaction->mode }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>{{ $order->transaction->status }}</td>
                        </tr>
                        <tr>
                            <th>Transaction Date</th>
                            <td>{{ $order->transaction->created_at}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
