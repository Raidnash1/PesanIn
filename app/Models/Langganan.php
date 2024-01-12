<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Langganan extends Model
{
    protected $fillable = ['user_id',
    'paket_langganan_id',
    'status',
    'start_date',
    'end_date'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function paket_langganan()
    {
        return $this->belongsTo(PaketLangganan::class, 'paketLangganan_id');
    }
};
