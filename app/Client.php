<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Client  extends Authenticatable
{
    use Notifiable;

    protected $dates=['created_at'];


    protected $fillable=['name','code','email','city','phone','address','status'];

    public function getStatusNameAttribute()
    {
        if ($this->status == 1)
        {
            return 'Active';
        }
        return 'DisActive';
    }

    public function orders()
    {
        return $this->hasMany(Order::class)->latest();
    }
}
