<?php

namespace App;

use Devfaysal\BangladeshGeocode\Models\District;
use Devfaysal\BangladeshGeocode\Models\Division;
use Devfaysal\BangladeshGeocode\Models\Upazila;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
  protected $guarded=[];

  public function divisions()
  {
      return $this->belongsTo(Division::class,'division','id');
  }
  public function districts()
  {
      return $this->belongsTo(District::class,'district','id');
  }
  public function upazilas()
  {
      return $this->belongsTo(Upazila::class,'thana','id');
  }

}
