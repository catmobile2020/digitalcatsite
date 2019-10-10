<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $dates=['created_at'];


    protected $fillable=['name','username','email','country','phone','address','role_id','pharmacy_id','status','password'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getStatusNameAttribute()
    {
        if ($this->status == 1)
        {
            return 'Active';
        }
        return 'DisActive';
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password']=bcrypt($value);
    }

    public function orders()
    {
        return $this->hasMany(Order::class)->latest();
    }

    public function pharmacy()
    {
        return $this->belongsTo(Pharmacy::class)->withDefault();
    }

    public function getUserTypeAttribute()
    {
        if ($this->role_id == 1)
        {
            return 'Admin';
        }elseif  ($this->role_id == 2)
        {
            return 'Pharmacy Owner';
        }else
        {
            return 'Pharmacist';
        }
    }
}
