<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FieldInvestigation extends Model
{
    use HasFactory;

    protected $fillable = [
        'agent_id',
        'farmer_id',
        'land_verified_amount',
        'crop_or_sector_status',
        'agent_comments',
        'investigation_image',
        'recommendation',
    ];

    // কৃষকের ডাটা টানার জন্য রিলেশনশিপ
    public function farmer()
    {
        return $this->belongsTo(Farmer::class, 'farmer_id');
    }

    // এজেন্টের ডাটা টানার জন্য রিলেশনশিপ (যদি কখনো এডমিন প্যানেল থেকে দেখতে চান)
    public function agent()
    {
        return $this->belongsTo(Agent::class, 'agent_id');
    }
}
