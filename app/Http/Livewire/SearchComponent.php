<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;

class SearchComponent extends Component
{
    public $sorting;
    public $search;

    public function mount()
    {
        // $this->fill(request()->only('search','product_cat', 'product_cat_id'));
        $this->fill(request()->only('search'));
    }

    public function sortby($value)
    {
        $this->sorting = $value;
    }

    public function store($product_id, $product_name, $product_price)
    {
        Cart::add($product_id, $product_name,1 , $product_price)->associate('App\Models\Product');
        session()->flash('success_message', 'Item added in Cart');
        return redirect()->route('product.cart');
    }
    
    use WithPagination;
    public function render()
    {
        if($this->sorting == 'newness') {
            $products = Product::where('name','like', '%'.$this->search.'%')->OrWhere('short_description','like', '%'.$this->search.'%')->orderBy('created_at','DESC')->paginate(12);

        } else if($this->sorting == 'price') {
            $products = Product::where('name','like', '%'.$this->search.'%')->OrWhere('short_description','like', '%'.$this->search.'%')->orderBy('regular_price','ASC')->paginate(12);

        } else if($this->sorting == 'price-desc') {
            $products = Product::where('name','like', '%'.$this->search.'%')->OrWhere('short_description','like', '%'.$this->search.'%')->orderBy('regular_price','DESC')->paginate(12);
            
        } else {
            $products = Product::where('name','like', '%'.$this->search.'%')->OrWhere('short_description','like', '%'.$this->search.'%')->paginate(12);
        }
        $categories = Category::all();
        
        return view('livewire.search-component', ['products'=> $products, 'categories'=> $categories])->layout('layouts.base');
    }
}
