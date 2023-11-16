<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public function user() {
        return $this->belongsTo(User::class, 'id_user');
    }
    public function menu() {
        return $this->belongsTo(Menu::class, 'id_menu');
    }
    use HasFactory;
}
