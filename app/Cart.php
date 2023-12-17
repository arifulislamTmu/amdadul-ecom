<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cart extends Model
{
    protected $fillable = [
        'product_id', 'qty', 'price','product_size','product_color','user_ip',
    ];

    public function product()
    {
           return $this->belongsTo(Product::class,'product_id');
    }
}
