<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankPayment extends Model
{
    use HasFactory;
    protected $table = 'bank_payments';

    protected $fillable = [
        'bank_name',
        'name',
        'address',
        'phone',
        'amount',
        'transaction_id',
        'status',
    ];
}
