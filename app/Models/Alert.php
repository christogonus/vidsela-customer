<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alert extends Model
{
    use HasFactory;

    protected $casts = [
        'show_days' => 'boolean',
        'show_hours' => 'boolean',
        'show_minutes' => 'boolean',
        'show_seconds' => 'boolean',
        'show_announcement_image' => 'boolean',
        'show_announcement_button' => 'boolean',
    ];

    protected $guarded = [];

}
