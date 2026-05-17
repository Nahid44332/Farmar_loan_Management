<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BkashPayment extends Model
{
    use HasFactory;
    protected $table = 'bkash_payments'; // টেবিলের নাম নির্দিষ্ট করে দেওয়া হলো

    protected $fillable = [
        'name',
        'address',
        'phone',
        'amount',
        'transaction_id',
        'status',
    ];
}
