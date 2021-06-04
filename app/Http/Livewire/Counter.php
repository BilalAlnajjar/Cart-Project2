<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth\Events\Validated;

class Counter extends Component

{
    use WithPagination, WithFileUploads;
    public $product_id;
    public $quantity;
    public $price;
    public $price_order;
    public $discount;
    public $cart_id;
    public $user_id = 1;

    protected $rules = [
        'name' => 'required|min:6',
        'email' => 'required|email',
    ];

    public function render()
    {
        $products = Product::paginate(10);
        return view('livewire.counter', [
            'products' => $products,
        ]);
    }

    public function storeCart($price, $product_id)
    {
        $this->product_id = $product_id;
        $this->price = $price;

        $this->validate([
            'price' => 'required',
            'product_id' => 'required|int|exists:products,id',
        ]);
        $oldcart = Cart::where("user_id",'=',$this->user_id)->where("product_id",'=',$this->product_id);

        if ($oldcart->first()) {
            $oldcart->update([
                'quantity' => $oldcart->first()->quantity +1,
            ]);
        } else{
            $cart = Cart::create([
                'product_id' => $this->product_id,
                'user_id' => $this->user_id,
                'price' => $this->price,
            ]);
        }

        $this->alert('success', 'Complete add product to cart', [
            'position' =>  'top-end',
            'timer' =>  3000,
            'toast' =>  true,
            'text' =>  '',
            'confirmButtonText' =>  'Ok',
            'cancelButtonText' =>  'Cancel',
            'showCancelButton' =>  true,
            'showConfirmButton' =>  false,
      ]);

    }

    public function updateCart()
    {
    }

    public function storeOrder()
    {
    }
}
