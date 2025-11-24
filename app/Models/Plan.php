<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Plan extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'price',
        'currency',
        'is_hidden',
        'features',
        'status',
        'sort_order',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'is_hidden' => 'boolean',
        'features' => 'array',
    ];

    /**
     * Get subscriptions for this plan
     */
    public function subscriptions(): HasMany
    {
        return $this->hasMany(Subscription::class);
    }

    /**
     * Get active subscriptions count
     */
    public function getActiveSubscriptionsCountAttribute(): int
    {
        return $this->subscriptions()->where('status', 'active')->count();
    }

    /**
     * Check if plan has a specific feature
     */
    public function hasFeature(string $feature): bool
    {
        return isset($this->features[$feature]) && $this->features[$feature];
    }

    /**
     * Get feature limit
     */
    public function getFeatureLimit(string $feature): int
    {
        return $this->features[$feature] ?? 0;
    }

    /**
     * Scope for active plans
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    /**
     * Scope for visible plans (not hidden)
     */
    public function scopeVisible($query)
    {
        return $query->where('is_hidden', false);
    }

    /**
     * Scope for hidden plans
     */
    public function scopeHidden($query)
    {
        return $query->where('is_hidden', true);
    }
}
