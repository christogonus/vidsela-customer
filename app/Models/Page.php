<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $guarded = ['video_id'];

    protected $casts = [
        'show_headline_1' => 'boolean',
        'show_headline_2' => 'boolean',
        'show_subheadline' => 'boolean',
        'show_after_video_text' => 'boolean',
    ];

}
