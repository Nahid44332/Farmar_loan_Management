<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Agent extends Model
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

    /**
     * পাসওয়ার্ড এবং টোকেন হাইড রাখার জন্য।
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * ডাটাবেস থেকে যখন ডাটা আসবে, তখন অটোমেটিক টাইপ কাস্টিং এর জন্য।
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed', // লারাভেল ১০+ ভার্সনের জন্য
    ];
}
