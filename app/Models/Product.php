<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public function wishlistedByUsers()
    {
        return $this->hasMany(Wishlist::class);
    }
}
