<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FooterSetting extends Model
{
    use HasFactory;
    protected $fillable = [
        'location',
        'phone',
        'email',
        'facebook',
        'twitter',
        'linkedin',
        'instagram',
        'about_text',
        'newsletter_text',
    ];
}
