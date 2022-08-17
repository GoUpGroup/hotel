<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OwnerHotel extends Model
{
    use HasFactory;
    
    function identity(){
        return $this->belonTo(IdentityType::class);
    }

    function nationality(){
        return $this->belonTo(Nationality::class);
    }
}
