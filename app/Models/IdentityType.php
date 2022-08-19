<?php

namespace App\Models;

use App\Models\Escort;
use App\Models\Booking;
use App\Models\OwnerHotel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class IdentityType extends Model
{
    use HasFactory;

   public function ownerHotel(){
        return $this>hasMany(OwnerHotel::class,'identity_id');
    }
    public function bookingHotel(){
        return $this>hasMany(Booking::class,'identity_id');
    }
    public function escort(){
        return $this>hasMany(Escort::class,'identity_id');
    }
}
