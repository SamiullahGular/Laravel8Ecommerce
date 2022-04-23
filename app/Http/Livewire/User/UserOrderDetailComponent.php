<?php

namespace App\Http\Livewire\User;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class UserOrderDetailComponent extends Component
{
    public $o_id;

    public function mount($order_id)
    {
        $this->o_id = $order_id;
    }

    public function cancelOrder()
    {
        $order = Order::find($this->o_id);
        $order->status = 'canceled';
        $order->canceled_date = DB::raw('CURRENT_DATE');
        $order->save();
        session()->flash('cancel_order_msg', 'Order has been canceled.');
    }

    public function render()
    {
        $order = Order::where('user_id', Auth::user()->id)->where('id', $this->o_id)->first();
        return view('livewire.user.user-order-detail-component', ['order'=> $order])->layout('layouts.base');
    }
}
