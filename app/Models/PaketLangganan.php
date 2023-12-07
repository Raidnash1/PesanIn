<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PaketLangganan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    public function langganan()
    {
        return $this->belongsTo(Langganan::class, 'Langganan_id');
    }
}
