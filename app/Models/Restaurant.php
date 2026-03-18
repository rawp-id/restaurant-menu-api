<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    /** @use HasFactory<\Database\Factories\RestaurantFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'phone',
        'opening_hours'
    ];

    public function menuItems()
    {
        return $this->hasMany(MenuItem::class);
    }
}
