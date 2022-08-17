<?php

namespace App\Models;

use App\Models\Nationality;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blocklist extends Model
{
    use HasFactory;

   public function nationality(){
         return  $this->belongsTo(Nationality::class);
    }
}
