<?php

namespace App;

use App\Offer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Project extends Model
{
    protected $table = 'projects';

    public function offer(): HasOne
    {
        return $this->hasOne(Offer::class);
    }
}
