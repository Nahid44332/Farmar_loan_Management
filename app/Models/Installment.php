<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Installment extends Model
{
    use HasFactory;

    protected $fillable = ['farmer_id', 'installment_no', 'amount', 'due_date', 'status', 'paid_at'];

    public function farmer()
    {
        return $this->belongsTo(Farmer::class);
    }
}
