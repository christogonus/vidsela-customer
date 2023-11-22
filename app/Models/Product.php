<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'is_active' => 'boolean',
        'show_button_2' => 'boolean',
        'show_freegift_1' => 'boolean',
        'show_freegift_2' => 'boolean',
        'show_freegift_2' => 'boolean',
    ];
}
