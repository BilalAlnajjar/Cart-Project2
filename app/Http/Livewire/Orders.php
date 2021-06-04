<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;

class Orders extends Component
{
    public $order;

    // public function mount($order){
    //     $this->order = $order;
    // }
    public function render()
    {
        $this->order = Order::all()->last();
        // dd($order->products());
        return view('livewire.orders',[
            'order' => $this->order,
        ]);
    }
}
