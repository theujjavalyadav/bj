<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
  public function location()
  {
    return $this->hasMany(Location::class);
  }


  protected $fillable = [
    'name',
    'logo',
    'business_type',
    'description'
  ];
}
