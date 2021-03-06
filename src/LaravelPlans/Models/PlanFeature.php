<?php

namespace Elshaden\LaravelPlans\Models;

use Illuminate\Database\Eloquent\Model;
use Elshaden\LaravelPlans\Traits\BelongsToPlan;
use Elshaden\LaravelPlans\Contracts\PlanFeatureInterface;

class PlanFeature extends Model implements PlanFeatureInterface
{
    use BelongsToPlan;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'plan_id',
        'code',
        'value',
        'sort_order'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at', 'updated_at'
    ];

    /**
     * Get feature usage.
     *
     * This will return all related
     * subscriptions usages.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function usage()
    {
        return $this->hasMany(config('laravelplans.models.plan_subscription_usage'));
    }

    /**
     * A resource key to be used by the the JSON API Serializer responses.
     */
    protected $resourceKey = 'plan_features';
}
