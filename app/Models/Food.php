<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $table = "foods";

    protected $fillable = [
        "food_name",
        "food_details",
        "food_price",
        "food_image"
    ];
}
