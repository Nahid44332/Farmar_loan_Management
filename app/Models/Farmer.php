<?php

namespace App\Models;

// ১. মামা, এই লাইনটি অবশ্যই থাকতে হবে
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

// ২. এখানে Model এর জায়গায় Authenticatable হবে
class Farmer extends Authenticatable
{
    use HasFactory, Notifiable;

    // আপনার বাকি কোড (যেমন $fillable) যা আছে তাই থাকবে
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
        'loan_duration',       // এটি অবশ্যই থাকতে হবে
        'monthly_installment', // এটি অবশ্যই থাকতে হবে
        'agent_id'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function investigations()
    {
        return $this->hasMany(FieldInvestigation::class, 'farmer_id');
    }
}
