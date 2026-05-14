<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Farmer extends Model
{
    use HasFactory;

      protected $fillable = [

        'name',
        'phone',
        'nid',
        'land_amount',
        'loan_amount',
        'category',
        'image',
        'address',
        'password',
        'status',

    ];
}
