<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Copon extends Model
{
    protected $fillable = [
        'coupon_name','discount', 'status',
    ];

    public function product()
    {
           return $this->belongsTo(Product::class,'product_id');
    }
  
}
