<?php

namespace App;

use App\Talent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    public function talents(): HasMany
    {
        return $this->hasMany(Talent::class);
    }
}
