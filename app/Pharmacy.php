<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pharmacy extends Model
{
    protected $fillable=['name','address','phone','status','lat','lng','distance'];

    public function getStatusNameAttribute()
    {
        if ($this->status == 1)
        {
            return 'Active';
        }
        return 'DisActive';
    }

    public function members()
    {
        return $this->hasMany(User::class)->where('role_id','!=',1)->with('orders');
    }

    public function clients()
    {
        return $this->hasManyThrough(Order::class,User::class);
    }

}
