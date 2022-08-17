<?php

namespace App\Models;

use App\Models\OwnerHotel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Nationality extends Model
{
    use HasFactory;
    public function ownerHotelNationality(){

        return $this->hanMany(OwnerHotel::class,'nationality_id');
    }
}
