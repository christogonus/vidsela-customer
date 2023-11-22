<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timer extends Model
{
    use HasFactory;

    protected $casts = [
        'countdown_date' => 'datetime',
        'show_day' => 'boolean',
        'show_hour' => 'boolean',
        'show_minute' => 'boolean',
    ];

    protected $guarded = [];

}
