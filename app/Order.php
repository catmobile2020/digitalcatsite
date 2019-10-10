<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable=['order_number','comment','client_id','user_id','has_free','confirmation_code','activated'];

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function getHasFreePhotoAttribute()
    {
        return $this->has_free ? asset('assets/admin/img/paid_free.png') : asset('assets/admin/img/paid.png');
    }
}
