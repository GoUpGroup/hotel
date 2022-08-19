<?php

namespace App\Models;
use App\Models\OwnerHotel;
use Laravel\Sanctum\HasApiTokens;

use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function Policies()
    {
        return $this->hasMany(Product::class, 'user_id');
    }

    public function profile()
    {
        return $this->hasOne(UserProfile::class, 'user_id');
    }
    public function notificationFrom()
    {
        return $this->hasMany(   Notification::class, 'from_user_id');
    }

    public function notificationTo()
    {
        return $this->hasMany(Notification::class, 'to_user_id');
    }
    public function owner()
    {
        return $this->hasMany(OwnerHotel::class,'user_id');
    } 
     
    public function reciption()
    {
        return $this->belongsTo(Reciption::class,'user_id');
    }
    
    public function booking()
    {
        return $this->belongsTo(Reciption::class,'reciption_id');
    }
    
   


    /**
     * Check if the user is authenticate and has admin role
     *
     * @return boolean
     *
     */
    public function isAdmin()
    {
        if (!Auth::check()) {
            return false;
        }
        $user = User::find(Auth::user()->id);
        if ($user->role == 1 || $user->role == 0) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Check if the user is authenticate and has super admin role
     *
     * @return boolean
     *
     */
    public function isSuperAdmin()
    {
        if (!Auth::check()) {
            return false;
        }
        $user = User::find(Auth::user()->id);
        if ($user->role == 0) {
            return true;
        } else {
            return false;
        }
    }
}
