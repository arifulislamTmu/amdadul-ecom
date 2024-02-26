<?php

namespace App;

use Devfaysal\BangladeshGeocode\Models\District;
use Devfaysal\BangladeshGeocode\Models\Division;
use Devfaysal\BangladeshGeocode\Models\Upazila;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded=[];

    public function shippings()
    {
        return $this->hasMany(Shipping::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }



}
