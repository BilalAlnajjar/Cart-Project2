<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderProduct;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Carts extends Component
{
    public $quantitys = [
        '0' => 1
];
    public $orderPrice = 0;
    public function render()
    {
        $carts = Cart::all();
        return view('livewire.carts',[
            'carts' => $carts,
        ]);
    }

    public function cartDelete($id){
         $cart = Cart::findOrFail($id);
         $cart->delete();

         $this->alert('success', 'Complet deleted product', [
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


    public function updateQuantity($id){
       $cart = Cart::findOrFail($id);
       dd($this->quantitys);
       $cart->update([
           'quantity' => $this->quantitys[$id],
       ]);

       $this->alert('success', 'Complete Updated Product', [
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

    public function storeOrder(){
        $orderPrice = 0;
        $carts = Cart::all();
        foreach($carts as $cart){
            $orderPrice = ($cart->price * $cart->quantity) + $orderPrice;
        }

        $order = Order::create([
            'price' =>  $orderPrice,
            'user_id' => 1,
        ]);

        foreach($carts as $cart){
            $productsOrder = OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $cart->product_id,
                'price' => $cart->price,
                'quantity' => $cart->quantity,
            ]);
        }

        return redirect()->route('checkout');
    }
}
