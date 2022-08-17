<?php

namespace App\Models;

use App\Models\OwnerHotel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class IdentityType extends Model
{
    use HasFactory;

    // function ownerHotel(){
    //     return $this>hasMany(OwnerHotel::class,'identity_id');
    // }
}
