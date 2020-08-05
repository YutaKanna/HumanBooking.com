<?php

namespace App;

use App\Project;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Offer extends Model
{
    protected $table = 'offers';

    /**
     * @return BelongsToMany
     */
    public function talents(): BelongsToMany
    {
        return $this->belongsToMany(
            Talent::class,
            'offer_talent',
            'offer_id',
            'talent_id',
        );
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
