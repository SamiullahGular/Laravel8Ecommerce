<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;

class ShopComponent extends Component
{
    public $sorting;
    public $search;

    public $min_price;
    public $max_price;

    public function keyWore($value)
    {
        $this->search = $value;
    }

    public function mount()
    {
        $this->min_price = 1;
        $this->max_price = 1000;
    }

    public function sortby($value)
    {
        $this->sorting = $value;
    }

    public function store($product_id, $product_name, $product_price)
    {
        Cart::instance('cart')->add($product_id, $product_name,1 , $product_price)->associate('App\Models\Product');
        session()->flash('success_message', 'Item added in Cart');
        return redirect()->route('product.cart');
    }

    public function addToWishList($product_id, $product_name, $product_price) 
    {
        Cart::instance('wishlist')->add($product_id, $product_name,1 , $product_price)->associate('App\Models\Product');
        $this->emitTo('wishlist-component', 'refreshComponent');
        $this->emitTo('wish-list-count-component', 'refreshComponent');
    }
    
    public function removeFromWishlist($product_id)
    {
        foreach(Cart::instance('wishlist')->content() as $witem)
        {
            if($witem->id == $product_id)
            {
                Cart::instance('wishlist')->remove($witem->rowId);
                $this->emitTo('wishlist-component', 'refreshComponent');
                $this->emitTo('wish-list-count-component', 'refreshComponent');
                return;
            }
        }
    }

    use WithPagination;
    public function render()
    {
        if($this->sorting == 'newness') {
            $products = Product::whereBetween('regular_price',[$this->min_price, $this->max_price])->where('name','like', '%'.$this->search.'%')->orderBy('created_at','DESC')->paginate(12);

        } else if($this->sorting == 'price') {
            $products = Product::whereBetween('regular_price',[$this->min_price, $this->max_price])->where('name','like', '%'.$this->search.'%')->orderBy('regular_price','ASC')->paginate(12);

        } else if($this->sorting == 'price-desc') {
            $products = Product::whereBetween('regular_price',[$this->min_price, $this->max_price])->where('name','like', '%'.$this->search.'%')->orderBy('regular_price','DESC')->paginate(12);
            
        } else {
            $products = Product::whereBetween('regular_price',[$this->min_price, $this->max_price])->where('name','like', '%'.$this->search.'%')->paginate(12);
        }
        $categories = Category::all();
        
        return view('livewire.shop-component', ['products'=> $products, 'categories'=> $categories])->layout('layouts.base');
    }
}
