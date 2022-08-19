<?php

namespace App\Models;

use App\Models\Booking;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Escort extends Model
{
    use HasFactory;

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
    function identity(){
        return $this->belonTo(IdentityType::class);
    }

    function nationality(){
        return $this->belonTo(Nationality::class);
    }
}
