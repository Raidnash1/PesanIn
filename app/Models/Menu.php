<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_menu');
    }
    public function order()
    {
        return $this->hasMany(Order::class);
    }

    public function review()
    {
        return $this->hasMany(Review::class);
    }
}
