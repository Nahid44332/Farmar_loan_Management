<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Counter extends Model
{
    use HasFactory;
    protected $fillable = [
        'number',
        'title_line_1',
        'title_line_2',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
