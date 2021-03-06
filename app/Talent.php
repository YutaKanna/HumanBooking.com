<?php

namespace App;

use App\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Talent extends Model
{
    protected $table = 'talents';

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * @return BelongsToMany
     */
    public function offers(): BelongsToMany
    {
        return $this->belongsToMany(
            Offer::class,
            'offer_talent',
            'talent_id',
            'offer_id',
        );
    }

    public function agency(): BelongsTo
    {
        return $this->belongsTo(Agency::class);
    }
}
