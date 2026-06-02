<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['farmer_id', 'installment_id', 'transaction_id', 'payment_method', 'amount', 'status'];

    public function farmer()
    {
        return $this->belongsTo(Farmer::class);
    }

    public function installment()
    {
        return $this->belongsTo(Installment::class);
    }

}
