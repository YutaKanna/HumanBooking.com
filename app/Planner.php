<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Planner extends Model
{
    protected $table = 'planners';

    /**
     * @return BelongsToMany
     */
    public function talents(): BelongsToMany
    {
        return $this->belongsToMany(
            Talent::class,
            'planner_talent',
            'planner_id',
            'talent_id',
        );
    }
}
