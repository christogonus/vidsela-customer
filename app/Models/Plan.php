<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $casts = [
        'expires' => 'integer',
        'is_active' => 'boolean',
    ];

    /**
     * Interact with the plan's price.
     */
    protected function price(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value / 100,
            set: fn ($value) => $value * 100,
        );
    }

    public function createSubscription(Team $team) {
        $subscription = new Subscription();
        $subscription->team_id = $team->id;
        $subscription->plan_id = $this->id;
        $subscription->expires_at = ($this->expires == 0) ? null : now()->addDays($this->expires);
        $subscription->save();
    }

}
