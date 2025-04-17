<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = [
        'business_id', 
        'address', 'city', 'state', 'zip_code', 'country'
    ];
    
    function business()
    {
        return $this->belongsTo(Business::class, 'business_id'); // Assuming business_id is the foreign key
    }
}

