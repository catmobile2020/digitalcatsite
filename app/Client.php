<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $dates=['created_at'];


    protected $guarded=['id'];

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
