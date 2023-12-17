<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $guarded=[];
    
    public function product()
    {
           return $this->belongsTo(Product::class,'product_id');
    }
}

