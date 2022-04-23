<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class AdminProductsComponent extends Component
{
    use WithPagination;

    public function deleteProduct($id)
    {
        $product = Product::find($id);
        if($product->image)
        {
            unlink(public_path('assets/images/').$product->image);
        }
        if($product->images)
        {
            $images = explode(',', $product->images);
            foreach($images as $image)
            {
                unlink(public_path('assets/images/').$image);
            }
        }
        
        $product->delete();
        session()->flash('message', $product->name.' has been deleted successfully!');
    }

    public function render()
    {
        $products = Product::orderBy('id', 'DESC')->paginate(10);
        return view('livewire.admin.admin-products-component',['products'=> $products])->layout('layouts.base');
    }
}
