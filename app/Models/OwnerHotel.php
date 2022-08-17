<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OwnerHotel extends Model
{
    use HasFactory;
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    function identity(){
        return $this->belonTo(IdentityType::class);
    }

    function nationality(){
        return $this->belonTo(Nationality::class);
    }
    public function hotel(){
        return $this->belongsTo(Hotel::class,'owner_hotel_id');
     }
}
