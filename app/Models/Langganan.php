<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $guard = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function paket_langganan()
    {
        return $this->belongsTo(PaketLangganan::class, 'paketLangganan_id');
    }
};
