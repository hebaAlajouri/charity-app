<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Project extends Model
{
    use HasFactory;

    protected $fillable = [
         'name_ar',
    'name_en',
    'code',
    'goal_amount',
    'raised_amount',
    'icon',
    'image',
    'description',
    'description_en', // optional
    ];

    protected $casts = [
        'goal_amount' => 'decimal:2',
        'raised_amount' => 'decimal:2',
    ];

    /**
     * Get the progress percentage of the project
     */
    public function getProgressPercentageAttribute()
    {
        if ($this->goal_amount <= 0) {
            return 0;
        }
        
        return min(($this->raised_amount / $this->goal_amount) * 100, 100);
    }

    /**
     * Get the remaining amount needed to reach the goal
     */
    public function getRemainingAmountAttribute()
    {
        return max($this->goal_amount - $this->raised_amount, 0);
    }

    /**
     * Check if the project has reached its goal
     */
    public function isGoalReached()
    {
        return $this->raised_amount >= $this->goal_amount;
    }

    /**
     * Scope to get active projects (you can modify this based on your needs)
     */
    public function scopeActive($query)
    {
        return $query->where('goal_amount', '>', 0);
    }

    /**
     * Scope to get projects ordered by progress
     */
    public function scopeOrderByProgress($query)
    {
        return $query->orderByRaw('(raised_amount / goal_amount) DESC');
    }
}