<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Report extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'email',
        'wa_number',
        'category',
        'location',
        'details',
        'photo_path',
        'status',
        'otp_code',
        'otp_expires_at',
    ];
}
