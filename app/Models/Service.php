<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function benefits()
    {
        return $this->hasMany(Benefit::class);
    }

    public function faqs()
    {
        return $this->hasMany(Faq::class);
    }
}
