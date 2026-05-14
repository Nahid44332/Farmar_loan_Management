<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = ['service_id', 'question', 'answer'];

    // সার্ভিসের সাথে রিলেশন (যদি সার্ভিস টেবিল থাকে)
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
