<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;
    function owner(){
        return $this->belongsTo(OwnerHotel::class);
    }
    
    function reciption(){
        return $this->hasMany(Reciption::class,'hotel_id');
    }

}
