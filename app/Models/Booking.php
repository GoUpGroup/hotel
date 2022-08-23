<?php

namespace App\Models;

use App\Models\User;
use App\Models\Hotel;
use App\Models\Escort;
use App\Models\Reciption;
use App\Models\Nationality;
use App\Models\IdentityType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
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
    public function escort()
    {
        return $this->hasMany(Escort::class,'booking_id');

    }
    public function reception() 
    {
       return $this->hasMany(Reciption::class,'user_id');
    }
    
    
}
