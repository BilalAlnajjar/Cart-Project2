<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function products(){
        return $this->belongsToMany(Product::class,'order_products')
        ->using(OrderProduct::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
