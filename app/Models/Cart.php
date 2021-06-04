<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Query\Builder;

class Cart extends Pivot
{
    use HasFactory;

    protected $table = "carts";

    public $timestamps = false;
    protected $guarded = [];


    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    protected function setKeysForSaveQuery($query)
    {
        $query->where('user_id',$this->user_id)
        ->where('product_id',$this->product_id);

        return $query;
    }
}
