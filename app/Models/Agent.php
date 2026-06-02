<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Agent extends Authenticatable 
{
    use HasFactory, Notifiable;

    /**
     * যে ফিল্ডগুলো একসাথে সেভ (Mass Assignment) করা যাবে।
     */
    protected $fillable = [
        'name',
        'phone',
        'district',
        'experience',
        'nid_proof',
        'password',
        'status', // pending, approved, rejected
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];

    
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function farmers()
    {
        return $this->hasMany(Farmer::class, 'agent_id');
    }
}