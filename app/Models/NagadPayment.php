<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NagadPayment extends Model
{
    use HasFactory;
    protected $table = 'nagad_payments';

    protected $fillable = [
        'name',
        'address',
        'phone',
        'amount',
        'transaction_id',
        'status',
    ];
}
