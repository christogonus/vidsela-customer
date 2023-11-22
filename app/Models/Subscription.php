<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $casts = [
        'expires_at' => 'datetime',
    ];

    /**
     * Scope a query to only include popular users.
     */
    public function scopeActive(Builder $query): void
    {
        $query->where('expires_at', '>=', now());
    }

    public function cancel() {
        //if subscription is not expired, then cancel
        if (! $this->expires_at->isPast()) {
            $this->expires_at = now()->subHours(1);
            $this->save();
        }
    }



}
