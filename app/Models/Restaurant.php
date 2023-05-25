<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function plats()
    {
        return $this->hasMany(Dish::class);
    }

}