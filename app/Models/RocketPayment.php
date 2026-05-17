<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RocketPayment extends Model
{
    use HasFactory;
    protected $table = 'rocket_payments';

    protected $fillable = [
        'name',
        'address',
        'phone',
        'amount',
        'transaction_id',
        'status',
    ];
}
